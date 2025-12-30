<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'producto_id',
        'ruta',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'producto_id', 'id');
    }
}
