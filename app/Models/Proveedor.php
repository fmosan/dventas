<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'idpersona',
    ];

    public function persona()
    {
        return  $this->belongsTo('App\Models\Persona', 'idpersona');
    }
}
