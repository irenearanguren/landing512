<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'code',
        'name',
        'desc',
        'pric',
        'cat_id',
        'stat',
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'producto_id', 'id');
    }

}
