@extends('adminlte::page')

@section('title', 'Sistema de Ventas')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Registrar Compra</h1>
@stop

@section('content')

    <form action="{{ route('compra.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idproveedor" class="form-label">Proveedor</label>
                        <select class="form-control" name="idproveedor">
                            <option selected>Seleccionar</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{$proveedor->id}}">{{$proveedor->persona->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="impuesto" class="form-label">Impuesto</label>
                        <input id="impuesto" name="impuesto" type="number" class="form-control" tabindex="1" value="0.18">
                    </div>
                    <div class="form-group">
                        <label for="serie_comprobante" class="form-label">Serie Comprobante</label>
                        <input id="serie_comprobante" name="serie_comprobante" type="text" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha_hora" class="form-label">Fecha</label>
                        <input id="fecha_hora" name="fecha_hora" type="date" class="form-control" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="tipo_comprobante" class="form-label">Tipo de Comprobante</label>
                        <select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
                            <option selected>Seleccionar</option>
                            <option value="BOLETA">Boleta</option>
                            <option value="FACTURA">Factura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="num_comprobante" class="form-label">Numero Comprobante</label>
                        <input id="num_comprobante" name="num_comprobante" type="text" class="form-control" tabindex="1">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idproducto" class="form-label">Productos</label>
                        <select class="form-control" name="idproducto" id="idproducto">
                            <option selected>Seleccionar</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="precio" class="form-label">Precio</label>
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
                            <th>SubTotal $</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL:</p>
                            </th>
                            <th>
                                <p align="right"><span id="total">$ 0.00</span>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL IMPUESTO (18%)</p>
                            </th>
                            <th>
                                <p align="right"><span id="total_impuesto">$ 0.00</span>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
                                <p align="right">TOTAL A PAGAR</p>
                            </th>
                            <th>
                                <p align="right"><span align="right" id="total_pagar_html">$ 0.00</span>
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



@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $("#agregar").click(function () {
                agregar();
            });
        });
        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        function agregar() {
            idproducto = $("#idproducto").val();
            producto = $("#idproducto option:selected").text();
            cantidad = $("#cantidad").val();
            precio = $("#precio").val();
            impuesto = $("#impuesto").val();
            if (idproducto != "" && cantidad != "" && cantidad > 0 && precio != "") {
                subtotal[cont] = cantidad * precio;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td> <td> <input type="hidden" id="precio[]" name="precio[]" value="' + precio + '"> <input class="form-control" type="number" id="precio[]" value="' + precio + '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input class="form-control" type="number" value="' + cantidad + '" disabled> </td> <td align="right">$' + subtotal[cont] + ' </td></tr>';
                /*'<tr class="selected" id="fila'+cont+'">' +
                '   <td>' +
                '       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');">' +
                '           <i class="fa fa-times"></i>' +
                '       </button>' +
                '   </td>' +
                '   <td>' +
                '       <input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'' +
                '   </td> ' +
                '   <td>' +
                '       <input type="hidden" id="price[]" name="price[]" value="' + price + '"> ' +
                '       <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> ' +
                '   </td>' +
                '   <td> ' +
                '       <input type="hidden" name="quantity[]" value="' + quantity + '">' +
                '       <input class="form-control" type="number" value="' + quantity + '" disabled>' +
                '   </td>' +
                '   <td align="right">s/' + subtotal[cont] + ' </td>' +
                '</tr>';*/
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la compra',
                })
            }
        }
        function limpiar() {
            $("#cantidad").val("");
            $("#precio").val("");
        }
        function totales() {
            $("#total").html("$ " + total.toFixed(2));
            total_impuesto = total * impuesto;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("$ " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }
        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }
        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto;
            total_pagar_html = total + total_impuesto;
            $("#total").html("CLP" + total);
            $("#total_impuesto").html("CLP" + total_impuesto);
            $("#total_pagar_html").html("CLP" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@stop
