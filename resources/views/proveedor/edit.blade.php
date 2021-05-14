@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
    <form action="{{ route('proveedor.update',$proveedor->id) }}" method="POST">
        {{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
        <div class="mb-3">
            <label for="" class="form-label">Codigo</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1" value="{{$proveedor->codigo}}">
        </div>
        <input name="_method" type="hidden" value="PATCH">
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$proveedor->persona->nombre}}">
        </div>
        <div class="mb-3" >
            <label for="" class="form-label">Tipo de Documento</label>
            <select class="form-select" aria-label="Default select example" name="tipo_documento" >
                <option selected>{{ $proveedor->persona->tipo_documento }}</option>
                <option value="DNI">DNI</option>
                <option value="RUC">RUC</option>
            </select>
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Numero de Documento</label>
            <input id="num_documento" name="num_documento" type="text" class="form-control" tabindex="1" value="{{$proveedor->persona->num_documento}}">
        </div>
        <div class="mb-3">
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control" tabindex="1" value="{{$proveedor->persona->direccion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="text" class="form-control" tabindex="1" value="{{$proveedor->persona->telefono}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email" name="email" type="text" class="form-control" tabindex="1" value="{{$proveedor->persona->email}}">
        </div>
        <a href="/proveedor" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
