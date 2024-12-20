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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('customer_name'); // Nama pelanggan
            $table->string('address'); // Alamat pelanggan
            $table->string('phone'); // Nomor HP pelanggan
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Relasi ke services
            $table->float('weight'); // Berat cucian dalam kg
            $table->decimal('total_price', 12, 2); // Total harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
