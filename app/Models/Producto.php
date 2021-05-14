<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'codigo',
        'nombre',
        'precio_venta',
        'stock',
        'descripcion',
        'idcategoria',
    ];

    public function categoria()
    {
        return  $this->belongsTo('App\Models\Categoria', 'idcategoria');
    }
}
