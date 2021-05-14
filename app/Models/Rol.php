<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    //protected $fillable = ['nombre','descripcion'];
    use HasFactory;


    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
