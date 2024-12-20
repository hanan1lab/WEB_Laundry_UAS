<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Order;
use App\Models\Service;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi yang sudah dibayar
        $laporan = Transaksi::with(['order', 'order.service']) // Mengambil relasi dengan order dan service
                            ->where('payment_status', 'Sudah Dibayar') // Menyaring status pembayaran yang sudah dibayar
                            ->get();

        // Mengambil data pembelian operasional
        $pembelian = Pembelian::all();

        // Menghitung total harga transaksi (total_price dari tabel order)
        $totalTransaksi = $laporan->sum(function ($transaksi) {
            return $transaksi->order ? $transaksi->order->total_price : 0; // Mengambil total_price dari relasi order
        });

        // Menghitung total harga pembelian operasional
        $totalPembelian = $pembelian->sum('total_price');

        // Menghitung total keuntungan
        $totalKeuntungan = $totalTransaksi - $totalPembelian;

        return view('laporan.index', compact('laporan', 'pembelian', 'totalKeuntungan'));
    }
}
