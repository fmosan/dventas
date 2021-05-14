@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Editar Usario</h1>
@stop

@section('content')
    <form action="{{ route('usuario.update',$usuario->id) }}" method="POST">
        {{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" tabindex="1" value="{{$usuario->name}}">
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email" name="email" type="text" class="form-control" tabindex="1" value="{{$usuario->email}}">
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input id="direccion" name="password" type="text" class="form-control" tabindex="1" value="{{$usuario->password}}">
        </div>
        <a href="/usuario" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
