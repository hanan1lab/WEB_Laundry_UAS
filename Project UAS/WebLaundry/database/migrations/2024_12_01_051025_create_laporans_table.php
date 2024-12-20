<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->date('service_date');
            $table->date('purchase_date');
            $table->decimal('price', 12, 2); // Harga pembelian
            $table->decimal('transaksi_price', 12, 2); // Harga transaksi
            $table->decimal('keuntungan', 12, 2); // Keuntungan yang dihitung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
