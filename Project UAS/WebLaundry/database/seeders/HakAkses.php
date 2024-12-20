<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class HakAkses extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions=[
            "Order",
            "Transaksi",
            "Pembelian",
            "Laporan",
            "Service"   
        ];  
        foreach($permissions as $n){
            Permission ::create(["name" => $n]);
        }

        $Pengguna = Role ::create(["name"=> "Admin"]);
        $Pengguna->givePermissionTo([$permissions[1],[2],[3],[4],[5]]);

        $Pengguna= Role :: create(["name"=>"Konsumen"]);
        $Pengguna->givePermissionTo([$permissions[0]]);
    }
}