<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class pembelian extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden =[
        "id",
        "user_id",
    ];

    // Pastikan nama tabel secara eksplisit
    protected $table = 'pembelians'; // Nama tabel di database

    // Kolom yang dapat diisi
    protected $fillable = [
        'item_name',
        'amount',
        'quantity',
        'total_price',
        'purchase_date',
    ];

    protected $dates = ['deleted_at'];
}
