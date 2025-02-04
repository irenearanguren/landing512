<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_pro';

    // Indica si la clave primaria es auto-incremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'cod_pro',
        'nom_cod',
        'est_pro',
        'pre_pro',
        'img_pro',
        'pes_pro',
    ];

    // Campos que no deben ser tocados por la asignación masiva
    protected $guarded = [];

    // Formato de las fechas
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
