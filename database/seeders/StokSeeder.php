<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Barang;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            $qty_in = $faker->numberBetween(10, 100);
            $stok_id = \DB::table('stoks')->insertGetId([
                'barang_id' => $barang->_id,
                'qty' => $qty_in,
                'note' => $faker->text(50),
                'created_at' => \Carbon\Carbon::now()->toISOString(),
                'updated_at' => \Carbon\Carbon::now()->toISOString(),
            ]);

            \DB::table('transaksi_stoks')->insert([
                'stok_id' => $stok_id,
                'qty' => $qty_in,
                'is_keluar' => false,
                'tgl_transaksi' => \Carbon\Carbon::now()->toDateTimeString(),
                'note' => $faker->text(50),
                'created_at' => \Carbon\Carbon::now()->toISOString(),
                'updated_at' => \Carbon\Carbon::now()->toISOString(),
            ]);
        }
    }
}
