<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi dengan relasi ke order dan service
    public function index()
    {
        // Mengambil semua transaksi beserta data order dan service terkait
        $transaksi = Transaksi::with(['order', 'order.service'])->get();

        return view('transaksi.index', compact('transaksi'));
    }

    // Menampilkan form untuk mengedit status dan status pembayaran transaksi
    public function editStatus($orderId)
    {
        $order = Order::with('transaksi')->find($orderId);

        // Jika order atau transaksi tidak ditemukan
        if (!$order || !$order->transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Order atau Transaksi tidak ditemukan');
        }

        return view('transaksi.edit', compact('order'));
    }

    // Menyimpan perubahan status dan status pembayaran transaksi
    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::with('transaksi')->find($orderId);

        // Pastikan order dan transaksi ditemukan
        if ($order && $order->transaksi) {
            // Validasi input
            $request->validate([
                'status' => 'required|string|max:255',
                'payment_status' => 'required|string|max:255',
            ]);

            // Update status dan status pembayaran pada transaksi
            $order->transaksi->update([
                'status' => $request->status,
                'payment_status' => $request->payment_status,
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Status dan Status Pembayaran berhasil diperbarui!');
        }

        return redirect()->route('transaksi.index')->with('error', 'Order tidak ditemukan');
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
{
    // Ambil data order
    $order = Order::find($request->order_id);

    // Pastikan order ditemukan
    if (!$order) {
        return redirect()->back()->with('error', 'Order tidak ditemukan!');
    }

    // Buat transaksi baru dan isi data yang diperlukan
    $transaksi = new Transaksi();
    $transaksi->order_id = $order->id;
    $transaksi->status = 'antrian'; // atau nilai status lain
    $transaksi->payment_status = 'belum_dibayar'; // atau nilai status pembayaran lain
    $transaksi->save();

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
}
}
