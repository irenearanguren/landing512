<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'client_id',
        'user_id',
        'adress',
        'status',
    ];

    protected $guarded = [];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


}

