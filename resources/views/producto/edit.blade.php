@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <form action="{{ route('producto.update',$productos->id) }}" method="POST">
        {{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">
        <div class="mb-3">
            <label for="" class="form-label">Codigo</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1" value="{{$productos->codigo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre </label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$productos->nombre}}">
        </div>

        <div class="mb-3" style="width: 45%">
            <label for="" class="form-label">Categoria</label>
            <select class="form-select" aria-label="Default select example" name="idcategoria">
                <option selected>Seleccionar</option>
                @foreach ($categoria as $categori)
                    <option value="{{$categori->id}}">{{$categori->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio_venta" name="precio_venta" type="text" class="form-control" tabindex="1" value="{{$productos->precio_venta}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Stock</label>
            <input id="stock" name="stock" type="text" class="form-control" tabindex="1" value="{{$productos->stock}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1" value="{{$productos->descripcion}}">
        </div>

        <a href="/producto" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop