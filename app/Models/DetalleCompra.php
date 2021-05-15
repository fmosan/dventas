<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_compras';
    protected $fillable = [
        'cantidad',
        'precio',
        'idcompra',
        'idproducto',
    ];
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto');
    }
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'idcompra');
    }
}
