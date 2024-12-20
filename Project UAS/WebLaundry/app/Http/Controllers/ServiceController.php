<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Mengambil semua data layanan
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create'); // Menampilkan form tambah layanan
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        Service::create($request->only(['name', 'price_per_kg'])); // Menyimpan layanan baru
        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }


     public function show(Service $service)
    {
        return view('services.show', compact('service')); // Menampilkan detail layanan
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service')); // Menampilkan form edit layanan
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        $service->update($request->only(['name', 'price_per_kg'])); // Mengupdate layanan
        return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete(); // Menghapus layanan
        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
