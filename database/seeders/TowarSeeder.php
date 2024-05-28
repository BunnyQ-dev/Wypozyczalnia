<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Towar;
use App\Models\Kategoria;

class TowarSeeder extends Seeder
{
    public function run()
    {
        $koparki = Kategoria::where('nazwa', 'Koparki')->first();
        $betoniarki = Kategoria::where('nazwa', 'Betoniarki')->first();
        $wiertarki = Kategoria::where('nazwa', 'Wiertarki')->first();

        Towar::create(['kategoria_id' => $koparki->id, 'nazwa' => 'Koparka CAT 320', 'opis' => 'Wydajna koparka gąsienicowa', 'cena' => 1000.00]);
        Towar::create(['kategoria_id' => $betoniarki->id, 'nazwa' => 'Betoniarka 500L', 'opis' => 'Duża betoniarka o pojemności 500 litrów', 'cena' => 200.00]);
        Towar::create(['kategoria_id' => $wiertarki->id, 'nazwa' => 'Wiertarka Bosch', 'opis' => 'Wiertarka udarowa Bosch', 'cena' => 150.00]);
    }
}
