<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PembelianController extends Controller
{
    public function index()
{
    // Ambil semua data dari tabel pembelians
    $pembelians = Pembelian::all();
    return view('pembelian.index', compact('pembelians'));
}

    public function create()
    {
        return view('pembelian.create'); // Tampilkan form tambah pembelian
    }

    public function store(Request $request)
{
    $request->validate([
        'item_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:1',
        'purchase_date' => 'required|date',
    ]);

    // Hitung total harga jika tidak diterima dari input
    $total_price = $request->amount * $request->quantity;

    // Simpan data pembelian
    Pembelian::create([
        'item_name' => $request->item_name,
        'amount' => $request->amount,
        'quantity' => $request->quantity,
        'purchase_date' => $request->purchase_date,
        'total_price' => $total_price, // Simpan total harga
    ]);

    return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan!');
}

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id); // Cari data pembelian
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diperbarui!');
    }

    public function show($id)
    {
        // Ambil data pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);

        // Kirim data pembelian ke view
        return view('pembelian.show', compact('pembelian'));
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus!');
    }
    // Tampilkan data yang dihapus (soft delete)
    public function trashed()
    {
        $trashed = Pembelian::onlyTrashed()->get();
        return view('pembelian.trashed', compact('trashed'));
    }
    // Pulihkan data dari arsip atau soft delete
    public function restore($id)
    {
        $pembelian = Pembelian::onlyTrashed()->findOrFail($id);
        $pembelian->restore();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dipulihkan!');
    }
public function forceDelete($id)
    {
        // Ambil data yang dihapus dengan soft delete
        $pembelian = Pembelian::onlyTrashed()->findOrFail($id);

        // Hapus permanen data dari database
        $pembelian->forceDelete();

        // Redirect kembali ke halaman data yang dihapus dengan pesan sukses
        return redirect()->route('pembelian.trashed')->with('success', 'Data pembelian berhasil dihapus secara permanen!');
    }
}