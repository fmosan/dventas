@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
   <!-- <a href="usuario/create" class="btn btn-primary mb-3">Crear</a> -->

    <table id="usuario"  class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($usuario as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->password}}</td>
                        <td>{{$usuario->rol->nombre}}</td>
                        <td>
                            <form action="{{ route('usuario.destroy',$usuario->id) }}" method="POST">
                            <a href="/usuario/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
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
                $('#usuario').DataTable({
                    "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
                });
            } );
        </script>
@stop
