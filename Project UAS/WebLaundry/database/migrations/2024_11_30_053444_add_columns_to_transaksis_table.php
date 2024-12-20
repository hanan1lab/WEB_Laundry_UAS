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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Menambahkan kolom order_id sebagai foreign key
            $table->string('status')->default('Dalam Antrian'); // Kolom status dengan nilai default
            $table->string('payment_status')->default('Belum Dibayar'); // Kolom payment_status dengan nilai default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
        });
    }
};
