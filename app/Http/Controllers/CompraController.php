<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::all();
        return view('compra.index')->with('compras', $compras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$productos = DB::table('productos')->get();
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('compra.create', compact('productos', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $compra = Compra::create($request->all()+[
                'iduser' => Auth::user()->id,
                'fecha_hora' => Carbon::now(),
            ]);
        $results = [];
        foreach ($request->idproducto as $key => $producto){
            $results[] = array(
                "idproducto"  => $request->idproducto[$key],
                "cantidad"    => $request->cantidad[$key],
                "precio"      => $request->precio[$key]
            );
            //dd($results);
        }
        $compra->detallesCompra()->createMany($results);
        return redirect()->route('compra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
