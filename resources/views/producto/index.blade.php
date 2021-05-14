@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
    <a href="producto/create" class="btn btn-primary mb-3">Crear</a>

    <table id="productos"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Opciones</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio Venta</th>
                <th scope="col">Stock</th>
                <th scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($productos as $produc)
                    <tr>
                        <td>
                            <form action="{{ route('producto.destroy',$produc->id) }}" method="POST">
                            <a href="/producto/{{$produc->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                        <td>{{$produc->codigo}}</td>
                        <td>{{$produc->nombre}}</td>
                        <td>{{$produc->categoria->nombre}}</td>
                        <td>{{$produc->precio_venta}}</td>
                        <td>{{$produc->stock}}</td>
                        <td>{{$produc->descripcion}}</td>

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
                $('#productos').DataTable({
                    "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
                });
            } );
        </script>
@stop
