<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $barangs = [
            'bubble gun pistol dus', 'make up dus', 'fizza + rumah', 'laptop + layar',
            'michrophone princes', 'trompet isi 20x900', 'tongkat isi 50x800',
            'tongkat B. isi 12x1750', 'eskrim mobil mika', 'teplon besar', 'mainan ember pantai',
            'robot transpormer dus', 'tentara pake remot', 'remot kontrol ambulance',
            'disco piano', 'telor dino besar', 'coffe set', 'drum band pake dus',
            'boneka fashion', 'robot spiderman + topeng dus', 'robot bisa rekam zip zap',
            'bubble toys dus', 'dino hewan isi 6', 'boneka pengantin', 'toys molen + derek',
            'mobil box', 'mobil derek mika',
        ];

        foreach ($barangs as $barang) { 
            $harga_modal = $faker->numberBetween(10, 1000);

            \DB::table('barangs')->insert([
                'nama' => $barang,
                'harga_modal' => $harga_modal * 1000,
                'harga_jual' => ($harga_modal + $faker->numberBetween(1, 20)) * 1000,
                'deskripsi' => $faker->text,
                'note' => $faker->text(50),
                'created_at' => \Carbon\Carbon::now()->toISOString(),
                'updated_at' => \Carbon\Carbon::now()->toISOString(),
            ]);
        }
    }
}
