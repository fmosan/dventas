<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total',
        'idproveedor',
        'iduser',
    ];

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'idproveedor');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'iduser');
    }

    //una compra tiene muchas lineas de pedido
    public function detalleCompra()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}
