<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'desc',
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
