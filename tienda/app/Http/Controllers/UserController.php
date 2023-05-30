<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB,
    Illuminate\Support\Facades\Hash,
    DateTime;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function authenticate(Request $request)
    {
      $credentials = $request->only('email', 'password');
      try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 400);
          }

      } catch (JWTException $e) {
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      $permisoUsuario = auth()->user()->roles[0]->permiso_clientes;
      return response()->json(['permisoUsuario' => $permisoUsuario, 'token' => $token]);
    }
    
    public function getAuthenticatedUser()
    {
        try {
            
          if (!$user = JWTAuth::parseToken()->authenticate()) {
                  return response()->json(['user_not_found'], 404);
          }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid xxx'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(['user' => $user]);
    }
    
    public function register(Request $request)
    {

        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'rol_id' => $request->get('rol_id'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            $users = DB::table('users as u')
                    ->join('roles as r', 'u.rol_id', '=', 'r.id')
                    ->where('name', 'LIKE', '%' . $request->input('name') . '%')
                    ->paginate(10);
            return view('users.index', ['users' => $users]);
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            $roles = Role::all();
            return view('users.create', ['roles' => $roles]);
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            try {
                DB::table('users')->insert([
                    'name'   => $request->get('name'),
                    'email'  => $request->get('email'),
                    'rol_id' => $request->get('rol'),
                    'password' => Hash::make($request->get('password')),
                    'created_at' => now()
                ]);
                return redirect()->route('users.index')->with('succes', 'Usuario registrado con exito!');
            } catch (\Illuminate\Database\QueryException $ex) {
                return back()->with('warning', $ex);
            }
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->find($id);
        return view('users.partials.form-delete', ['user' => $user]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            $roles = Role::all();
            $user = DB::table('users')->find($id);
            return view('users.edit', ['user' => $user, 'roles' => $roles]);
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            try {
                $affected = DB::table('users')->where('id', $id)
                        ->update([
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'rol_id' => $request->input('rol'),
                            'updated_at' => now()
                        ]);
                return redirect()->route('users.index')->with('succes', 'Usuario actualizado con exito!');
            } catch (Exception $ex) {
                return back()->with('warning', $ex);
            }
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->roles[0]->permiso_users == TRUE) {
            try {
                $affected = DB::table('users')->where('id', '=', $id)->delete();
                return back()->with('succes', 'Registro eliminado');
            } catch (Exception $ex) {
                return back()->with('warning', $ex);
            }
        }
        return back()->with('warning', 'Esta intentando acceder a una sección a la cual no tienes permiso.');
    }

    public function getTask() {
        try {
            $list = DB::table('list')->get();
            $data = DB::table('colums')->get();

            // $data = DB::table('colums')
            //             ->select('colums.id as columna', 'colums.label', 'colums.color', 'list.price',
            //             'list.order')
            //             ->join('list', 'colums.id', '=', 'list.colum_id')
            //             ->join('users', 'list.usuario_id', '=', 'users.id')
            //             ->get();
            
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
          return response()->json(['data' => $data, 'items' => $list]);
    }

    public function saveTask(Request $request) {

        try {
            DB::table('list')->insert([
                    'order'   => $request->get('order'),
                    'price'  => $request->item[0]['value'],
                    'colum_id' => $request->get('colum'),
                    'usuario_id' => 1,
                ]);
        } catch (\Throwable $th) {
            return "Error " . $th;
        }
        return response()->json(['ok' => '200'], 200);
    }
}
