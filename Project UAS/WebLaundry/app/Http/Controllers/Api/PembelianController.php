<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PembelianResource;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(ability: "Pembelian");
        $data = Pembelian::latest()->paginate(2);
        return new PembelianResource(true, "Data pembelian", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize(ability: "Pembelian");

        // Validasi input dari pengguna
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        // Membuat data pembelian baru
        $pembelian = Pembelian::create([
            'item_name' => $validated['item_name'],
            'amount' => $validated['amount'],
            'quantity' => $validated['quantity'],
            'total_price' => $validated['total_price'],
            'purchase_date' => $validated['purchase_date'],
        ]);

        // Mengembalikan response dengan resource
        return new PembelianResource(true, "Pembelian berhasil ditambahkan", $pembelian);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize(ability: "Pembelian");

        $show = Pembelian::find($id);

        if (!$show) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return new PembelianResource(true, "Data berhasil ditemukan", $show);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize(ability: "Pembelian");
        // Validasi input dari pengguna
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        // Mencari data pembelian berdasarkan ID
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        // Mengupdate data pembelian
        $pembelian->update([
            'item_name' => $validated['item_name'],
            'amount' => $validated['amount'],
            'quantity' => $validated['quantity'],
            'total_price' => $validated['total_price'],
            'purchase_date' => $validated['purchase_date'],
        ]);

        // Mengembalikan response dengan resource
        return new PembelianResource(true, "Pembelian berhasil diperbarui", $pembelian);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize(ability: "Pembelian");

        $delete = Pembelian::find($id);

        if (!$delete) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        // Menghapus data pembelian
        $delete->delete();

        return new PembelianResource(true, "Data berhasil dihapus", $delete);
    }
}
