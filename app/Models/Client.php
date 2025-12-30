<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'rif',
        'name',
        'email',
        'phone',
      
    ];
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }
}
