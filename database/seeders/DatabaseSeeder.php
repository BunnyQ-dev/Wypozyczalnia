<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Wywołaj seedery
        $this->call([
            KategoriaSeeder::class,
            TowarSeeder::class,
            // Dodaj inne seedery, jeśli istnieją
        ]);
    }
}
