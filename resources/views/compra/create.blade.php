@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Registrar Compra</h1>
@stop

@section('content')

    <form action="/detalle_compra" method="POST">
        @csrf
        <div class="mb-3" style="width: 45%">
            <label for="" class="form-label">Proveedor</label>
            <input id="proveedor" name="proveedor" type="text" class="form-control" tabindex="1" >
        </div>
        <div class="mb-3" style="width: 45%">
            <label for="" class="form-label">Impuesto</label>
            <input id="impuesto" name="impuesto" type="text" class="form-control" tabindex="1" value="0.18">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Comprobante</label>
            <select class="form-select" aria-label="Default select example" name="tipo_comprobante">
                <option selected>Seleccionar</option>
                <option value="BOLETA">Boleta</option>
                <option value="FACTURA">Factura</option>
            </select>
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Serie Comprobante</label>
            <input id="serie_comprobante" name="serie_comprobante" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Numero Comprobante</label>
            <input id="numero_comprobante" name="numero_comprobante" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Productos</label>
            <select class="form-select" aria-label="Default select example" name="idproducto">
                <option selected>Seleccionar</option>
                @foreach ($producto as $produc)
                    <option value="{{$produc->id}}">{{$produc->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" class="form-control" tabindex="1" value="0.00">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha_hora" name="fecha_hora" type="date" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="1">
        </div>

        <a href="/cliente" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
