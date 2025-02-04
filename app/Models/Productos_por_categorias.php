<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_por_categorias extends Model
{
    use HasFactory;

    protected $table = 'productos_por_categorias';
    protected $primaryKey = 'id_prod_cat';

    public $incrementing = true;
    public $KeyType = 'int';

    protected $fillable = [
        'id_prod',
        'id_cat',
    ];
}
