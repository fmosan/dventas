<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function proveedors()
    {
        return  $this->hasMany('App\Models\Porveedor', 'idproveedor');
    }
}
