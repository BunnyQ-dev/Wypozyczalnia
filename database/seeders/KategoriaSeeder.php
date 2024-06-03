<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategorie = [
            ['nazwa' => 'Koparki'],
            ['nazwa' => 'Spycharki'],
            ['nazwa' => 'Walce drogowe'],
            ['nazwa' => 'Podnośniki'],
            ['nazwa' => 'Betoniarki'],
            ['nazwa' => 'Wywrotki'],
            // Dodaj inne kategorie wypożyczalni sprzętu budowlanego
        ];

        DB::table('kategoria')->insert($kategorie);
    }
}
