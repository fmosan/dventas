<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'precio_compra',
        'idcompra',
        'idproducto',
    ];
    
    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }
    public function compras()
    {
        return $this->hasMany('App\Models\Compra');
    }
}
