<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'kode_buku'=>2,
            'judul'=>'Pemrogramman Java',
            'pengarang'=>'Alex Firdaus',
            'penerbit'=>'Graha Polinema',
            'Stock'=>'10'
        ]);
    }
}
