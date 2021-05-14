@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <form action="{{ route('categoria.update',$categoria->id) }}" method="POST">
        {{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
        <div class="mb-3">
            <label for="" class="form-label">nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$categoria->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Numero de Documento</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1" value="{{$categoria->descripcion}}">
        </div>

        <a href="/categoria" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
