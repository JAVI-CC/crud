<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = ['telefono', 'fecha_inicio', 'fecha_final'];
}
