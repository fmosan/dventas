@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Lista de Proveedores</h1>
@stop

@section('content')
    <a href="proveedor/create" class="btn btn-primary mb-3">Crear</a>

    <table id="proveedors"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo de Documento</th>
                <th scope="col">Numero de Documento</th>
                <th scope="col">Dirección</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($proveedors as $provee)
                    <tr>
                        <td>{{$provee->codigo}}</td>
                        <td>{{$provee->persona->nombre}}</td>
                        <td>{{$provee->persona->tipo_documento}}</td>
                        <td>{{$provee->persona->num_documento}}</td>
                        <td>{{$provee->persona->direccion}}</td>
                        <td>{{$provee->persona->telefono}}</td>
                        <td>{{$provee->persona->email}}</td>
                        <td>
                            <form action="{{ route('proveedor.destroy',$provee->id) }}" method="POST">
                            <a href="/proveedor/{{$provee->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
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
                $('#proveedors').DataTable({
                    "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
                });
            } );
        </script>
@stop
