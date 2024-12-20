<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
         'customer_name',
         'address', 
         'phone', 
         'service_id',
         'weight',
         'total_price',
    ];

    public function service()
    {
        //return $this->belongsTo(Service::class);
        return $this->belongsTo(Service::class, 'service_id');

    }

    public function transaksi()
    {
        //return $this->hasOne(Transaksi::class);
        return $this->hasOne(Transaksi::class, 'order_id');

    }
}
