<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProducController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = DB::table('products')
                        ->where('nombre', 'LIKE', '%' . $request->input('name') . '%')
                        ->paginate(10);
            return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::table('products')->insert([
                'nombre'    => $request->get('nombre'),
                'referencia' => $request->get('referencia'),
                'precio'    => $request->get('precio'),
                'peso' => $request->get('peso'),
                'categoria' => $request->get('categoria'),
                'stock' => $request->get('stock')
            ]);
            return redirect()->route('productos.index')->with('succes', 'Producto registrado con exito!');
        } catch (Exception $ex) {
            
            return back()->with('warning', $ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = DB::table('products')->find($id);
        return view('productos.partials.form-delete', ['producto' => $producto]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = DB::table('products')->find($id);
        return view('productos.edit', ['producto' => $producto]);
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
        try {
            $affected = DB::table('products')->where('id', $id)
                    ->update([
                        'nombre'    => $request->input('nombre'),
                        'referencia' => $request->input('referencia'),
                        'precio'    => $request->input('precio'),
                        'peso' => $request->input('peso'),
                        'categoria' => $request->input('categoria'),
                        'stock' => $request->input('stock')
                    ]);
            return redirect()->route('productos.index')->with('succes', 'Cliente actualizado con exito!');
        } catch (Exception $ex) {
            return back()->with('warning', $ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $affected = DB::table('products')->where('id', '=', $id)->delete();
            return back()->with('succes', 'Registro eliminado con exito!');
        } catch (Exception $ex) {
            return back()->with('warning', $ex);
        }
    }
}
