<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Stok;

class TransaksiStokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $stoks = Stok::all();

        foreach ($stoks as $stok) {
            $qty_in = $faker->numberBetween(10, 100);
            \DB::table('transaksi_stoks')->insert([
                'stok_id' => $stok->_id,
                'qty' => $qty_in,
                'is_keluar' => false,
                'tgl_transaksi' => \Carbon\Carbon::now()->toDateTimeString(),
                'note' => $faker->text(50),
                'created_at' => \Carbon\Carbon::now()->toISOString(),
                'updated_at' => \Carbon\Carbon::now()->toISOString(),
            ]);

            Stok::find($stok->_id)->increment('qty', $qty_in);

            for ($i=0; $i < $faker->numberBetween(1, 5); $i++) { 
                $qty_out = $faker->numberBetween(1, 5);

                $transaksi_id = \DB::table('transaksi_stoks')->insertGetId([
                    'stok_id' => $stok->_id,
                    'qty' => $qty_out,
                    'is_keluar' => true,
                    'tgl_transaksi' => \Carbon\Carbon::now()->toDateTimeString(),
                    'note' => $faker->text(50),
                    'created_at' => \Carbon\Carbon::now()->toISOString(),
                    'updated_at' => \Carbon\Carbon::now()->toISOString(),
                ]);

                Stok::find($stok->_id)->decrement('qty', $qty_out);

                $barang = Stok::with('barangs')->find($stok->_id)->barangs;

                \DB::table('penjualans')->insert([
                    'transaksi_stok_id' => $transaksi_id,
                    'nama_barang' => $barang->nama,
                    'harga_modal' => $barang->harga_modal * $qty_out,
                    'total_harga' => $barang->harga_jual * $qty_out,
                    'note' => $faker->text(50),
                    'created_at' => \Carbon\Carbon::now()->toISOString(),
                    'updated_at' => \Carbon\Carbon::now()->toISOString(),
                ]);
            }
        }
    }
}
