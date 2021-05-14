@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    <a href="auth/register" class="btn btn-primary mb-3">Crear</a>

    <table id="auth"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>

                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($usuarios as $usuarios)
                    <tr>
                        <td>{{$usuarios->codigo}}</td>
                        <td>{{$usuarios->Nombre}}</td>

                        <td>
                            <form action="{{ route('usuario.destroy',$usuarios->id) }}" method="POST">
                            <a href="/usuario/{{$usuarios->id}}/edit" class="btn btn-info">Editar</a>
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
                $('#clientes').DataTable({
                    "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
                });
            } );
        </script>
@stop
