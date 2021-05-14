@extends('adminlte::page')

@section('title', 'SisVentas')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <form action="{{ route('producto.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Codigo</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            <select class="form-select" aria-label="Default select example" name="idcategoria">
                <option selected>Seleccionar</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <label for="categoria">Categoria</label>
                <input name="idcategoria" class="form-control input-sm" placeholder="categoria" required>
            </div>
        </div> --}}

        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio_venta" name="precio_venta" type="number" value="0.00" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Stock</label>
            <input id="stock" name="stock" type="number" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1">
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
