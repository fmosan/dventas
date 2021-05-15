@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Lista de Compras</h1>
@stop

@section('content')
    <a href="{{ route('compra.create') }}" class="btn btn-primary mb-3">Crear</a>

    <table id="compras"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Opciones</th>
                <th scope="col">Usuario</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Tipo Comprobante</th>
                <th scope="col">Serie de Comprobante</th>
                <th scope="col">Numero de Comprobante</th>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($compras as $compr)
                    <tr>
                        <td>
                            <form action="{{ route('compra.destroy',$compr->id) }}" method="POST">
                            <a href="/compra/{{$compr->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                        <td>{{$compr->user->name}}</td>
                        <td>{{$compr->proveedor->persona->nombre}}</td>
                        <td>{{$compr->tipo_comprobante}}</td>
                        <td>{{$compr->serie_comprobante}}</td>
                        <td>{{$compr->num_comprobante}}</td>
                        <td>{{$compr->fecha_hora}}</td>
                        <td>{{$compr->total}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#compras').DataTable({
                    "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
                });
            } );
        </script>
@stop
