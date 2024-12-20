<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultToTotalPriceOnTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Mengubah kolom 'total_price' untuk menambahkan nilai default
            $table->decimal('total_price', 10, 2)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Membatalkan perubahan jika migrasi di-rollback
            $table->decimal('total_price', 10, 2)->nullable()->change();
        });
    }
}