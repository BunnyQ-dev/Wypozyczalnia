<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategoria;

class KategoriaSeeder extends Seeder
{
    public function run()
    {
        Kategoria::create(['nazwa' => 'Koparki']);
        Kategoria::create(['nazwa' => 'Betoniarki']);
        Kategoria::create(['nazwa' => 'Wiertarki']);
    }
}
