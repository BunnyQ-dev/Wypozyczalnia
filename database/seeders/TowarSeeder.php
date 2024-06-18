<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TowarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $towary = [
            ['kategoria_id' => 1, 'nazwa' => 'Koparka JCB 3CX', 'opis' => 'Koparka kołowa', 'cena' => 250.00],
            ['kategoria_id' => 2, 'nazwa' => 'Spycharka CAT D6', 'opis' => 'Spycharka gąsienicowa', 'cena' => 300.00],
            ['kategoria_id' => 3, 'nazwa' => 'Walec drogowy Bomag BW120', 'opis' => 'Walec tandemowy', 'cena' => 150.00],
            ['kategoria_id' => 4, 'nazwa' => 'Podnośnik nożycowy Genie GS1932', 'opis' => 'Podnośnik elektryczny', 'cena' => 200.00],
        ];

        DB::table('towar')->insert($towary);
    }
}
