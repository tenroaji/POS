<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\MasterBarang;
use App\Models\MasterKategoriBarang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'=>'Super Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at' =>now(),
            'password'=>Hash::make('qwe'),
            'remember_token'=>Str::random(10),
        ]);

        MasterKategoriBarang::create([
           'nama_kategori' => 'Cat'
        ]);

        MasterBarang::create([
            'kategori_id'=>1,
            'nama_barang'=>'Cat Merah',
            'harga_beli_barang'=>'50000',
            'harga_jual_barang'=>'60000',
            'stok_barang'=>'10',
        ]);
        Customer::create(['nama'=>'Muhammad',
            'alamat'=>'Jln. Raya No. 1',
            'nomor'=>'123456']);
    }
}
