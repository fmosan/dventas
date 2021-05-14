<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = DB::table('productos')->get();

        return view('detalle_compra.create')->with('producto', $producto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new DetalleCompra();
        $detalle->cantidad = $request->get('cantidad');
        $detalle->precio_compra = $request->get('precio_compra');
        $detalle->idproducto = $request->get('idproducto');

        $compra = new Compra;
        $compra->idproveedor = $request->get('idproveedor');
        $compra->tipo_comprobante = $request->get('tipo_comprobante');
        $compra->serie_comprobante = $request->get('serie_comprobante');
        $compra->num_comprobante = $request->get('num_comprobante');
        $compra->fecha_hora = $request->get('fecha_hora');
        $compra->impuesto = $request->get('impuesto');
        $cantidad = $request->get('cantidad');
        $precio_compra = $request->get('precio_compra');
        $totalcompra =  $cantidad * $precio_compra;
        $compra->total_compra = $totalcompra;

        $compra->iduser = \Auth::user()->id;
        $compra->save();


        $detalle->idcompra = $compra->id;
        $detalle->save();

        // Y restamos la existencia del original
        $productoActualizado = Producto::find($detalle->idproducto);
        $productoActualizado->stock += $cantidad;
        $productoActualizado->save();


        return redirect('/compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleCompra $detalleCompra)
    {
        //
    }
}
