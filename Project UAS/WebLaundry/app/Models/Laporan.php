<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'service_date',
        'purchase_date',
        'price',
        'transaksi_price',
        'keuntungan'
    ];

    // Menghindari timestamp otomatis (jika tidak dibutuhkan)
    public $timestamps = true;
}
