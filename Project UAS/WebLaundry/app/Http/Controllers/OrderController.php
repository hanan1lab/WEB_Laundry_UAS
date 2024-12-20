<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\transaksi;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['service', 'transaksi'])->get(); // Memuat data service dan transaksi
        return view('order.index', compact('orders')); // Sesuaikan path view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createOrder()
{
    $services = Service::all(); // Mengambil data layanan dari database
    return view('order.create', compact('services'));
}

public function storeOrder(Request $request)
{
    // Validasi input
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
        'service_id' => 'required|exists:services,id',  // Pastikan layanan ada di database
        'weight' => 'required|numeric|min:1',
    ]);

    // Memastikan layanan yang dipilih ada
    $service = Service::find($request->service_id);

    if (!$service) {
        return redirect()->back()->withErrors(['service_id' => 'Layanan tidak ditemukan.']);
    }

    // Menghitung total harga
    $total_price = $service->price_per_kg * $request->weight;

    // Menyimpan order
    $order = Order::create([
        'customer_name' => $request->customer_name,
        'address' => $request->address,
        'phone' => $request->phone,
        'service_id' => $request->service_id,
        'weight' => $request->weight,
        'total_price' => $total_price,
    ]);

    // Menyimpan transaksi yang terkait dengan order
    Transaksi::create([
        'order_id' => $order->id, // ID order yang baru dibuat
        'status' => 'antrian',  // Status transaksi default
        'payment_status' => 'belum_dibayar',  // Status pembayaran default
    ]);

    // Redirect ke halaman index setelah order dan transaksi berhasil dibuat
    return redirect()->route('order.index')->with('success', 'Order dan Transaksi berhasil dibuat!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('service')->findOrFail($id); // Cari order berdasarkan ID
        $services = Service::all(); // Ambil semua layanan untuk dropdown

        return view('order.edit', compact('order', 'services'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'service_id' => 'required|exists:services,id',  // Pastikan layanan ada di database
            'weight' => 'required|numeric|min:1',
        ]);

        $order = Order::findOrFail($id); // Cari order berdasarkan ID

        // Menghitung ulang total harga berdasarkan layanan yang dipilih
        $service = Service::findOrFail($request->service_id);
        $total_price = $service->price_per_kg * $request->weight;

        // Update data order (kecuali status)
        $order->update([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'weight' => $request->weight,
            'total_price' => $total_price,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Data Order berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

