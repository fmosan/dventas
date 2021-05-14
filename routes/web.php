<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('categoria', 'App\Http\Controllers\CategoriaController');
Route::resource('cliente', 'App\Http\Controllers\ClienteController');
Route::resource('usuario', 'App\Http\Controllers\UserController');
Route::resource('rol', 'App\Http\Controllers\RolController');
Route::resource('producto', 'App\Http\Controllers\ProductoController');
Route::resource('proveedor', 'App\Http\Controllers\ProveedorController');
Route::resource('compra', 'App\Http\Controllers\CompraController');
Route::resource('auth', 'App\Http\Controllers\UsuarioController');
Route::resource('detalle_compra', 'App\Http\Controllers\DetalleCompraController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
