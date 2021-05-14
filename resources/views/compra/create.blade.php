@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Registrar Compra</h1>
@stop

@section('content')

    <form action="/detalle_compra" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Proveedor</label>
                        <input id="proveedor" name="proveedor" type="text" class="form-control" tabindex="1" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Impuesto</label>
                        <input id="impuesto" name="impuesto" type="number" class="form-control" tabindex="1" value="0.18">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Serie Comprobante</label>
                        <input id="serie_comprobante" name="serie_comprobante" type="text" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Fecha</label>
                        <input id="fecha_hora" name="fecha_hora" type="date" class="form-control" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tipo de Comprobante</label>
                        <select class="form-control">
                            <option selected>Seleccionar</option>
                            <option value="BOLETA">Boleta</option>
                            <option value="FACTURA">Factura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Numero Comprobante</label>
                        <input id="numero_comprobante" name="numero_comprobante" type="text" class="form-control" tabindex="1">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Productos</label>
                        <select class="form-control" name="idproducto">
                            <option selected>Seleccionar</option>
                            @foreach ($producto as $produc)
                                <option value="{{$produc->id}}">{{$produc->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Cantidad</label>
                        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="form-label">Precio</label>
                        <input id="precio" name="precio" type="number" class="form-control" tabindex="1" value="0.00">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
            </div>
            <div class="form-group pt-3">
                <h4 class="card-title">Detalle de venta</h4>
                <div class="table-responsive col-md-12">
                    <table id="detalles" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Eliminar</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>SubTotal (CLP)</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL:</p>
                            </th>
                            <th>
                                <p align="right"><span id="total">CLP 0.00</span>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL IMPUESTO (19%)</p>
                            </th>
                            <th>
                                <p align="right"><span id="total_impuesto">CLP 0.00</span>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL A PAGAR</p>
                            </th>
                            <th>
                                <p align="right"><span align="right" id="total_pagar_html">CLP 0.00</span>
                                    <input type="hidden" name="total" id="total_pagar">
                                </p>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> <!--End Card Body -->

        <div class="card-footer">
            <a href="/cliente" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </div>

    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
