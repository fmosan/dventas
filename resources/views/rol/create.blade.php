@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1>Registrar Rol</h1>
@stop

@section('content')

    <form action="/rol" method="POST">
        @csrf
       
            <div>
                <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            </div>

            <div class="mt-4">
                <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                <x-jet-input id="descripcion" class="block mt-1 w-full" type="descripcion" name="descripcion" :value="old('descripcion')" required />
            </div>

           

            <a href="/rol" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button href="" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop