<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cambio_precio_dolar extends Model
{
    protected $table = 'cambio_precio_dolar';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'precio_dolar',
        'fecha',
    ];
}
