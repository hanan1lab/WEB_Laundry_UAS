<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\Service;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function adminHome()
    {
$antrian = transaksi::where('status', 'Antrian')->count();
        $proses = transaksi::where('status', 'Proses')->count();
        $selesai = transaksi::where('status', 'Selesai')->count();
        $dibatalkan = transaksi::where('status', 'Dibatalkan')->count();

        // Kirim data ke view
        return view('home.admin', compact('antrian', 'proses', 'selesai', 'dibatalkan'));
    }  

    // Halaman untuk Konsumen
    public function konsumenHome()
{
    $services = Service::all(); // Mengambil semua data layanan
    return view('home.konsumen', compact('services')); // Kirim data ke view
}

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
