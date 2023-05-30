<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $productos = DB::table('products')->get();

        $ventas = DB::table('products')
                    ->join('ventas_realizadas', 'products.id', '=',  'ventas_realizadas.producto_id')
                    ->get();
        // dd($ventas);
        return view('ventas.index', ['productos' => $productos, 'ventas' =>  $ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = DB::table('products')
            ->where('id', $request->get('producto_id'))->first();
        $cantidad = $stock->stock - $request->get('cantidad');    
        try {
            if ($cantidad > 0) {
                DB::table('ventas_realizadas')->insert([
                    'producto_id'    => $request->get('producto_id'),
                    'cantidad' => $request->get('cantidad')
                ]);
                $this->updateStock($request->get('producto_id'), $cantidad);
            } else {
                return redirect()->route('ventas.index')
                ->with('warning', 'No hay stock para esta venta!');
            }
        } catch (Exception $ex) {
            return back()->with('warning', $ex);
        }
        return redirect()->route('ventas.index')->with('succes', 'Venta registrado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStock($id, $cantidad) {
        $affected = DB::table('products')
              ->where('id', $id)
              ->update(['stock' => $cantidad]);
    }
}
