<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'status', 'payment_status',
    ];

    public function order()
    {
        //return $this->belongsTo(Order::class);
        return $this->belongsTo(Order::class, 'order_id');
    }
}
