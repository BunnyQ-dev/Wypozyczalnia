<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utwórz konto admina
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // Zalecane jest używanie funkcji Hash do haszowania hasła
            'role' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'Adminowski',
            'address' => 'ul. Admina 1, Warszawa',
        ]);

        // Utwórz trzy konta użytkowników z polskimi danymi
        User::create([
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('123'),
            'role' => 'user',
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'address' => 'ul. Kwiatowa 10, Kraków',
        ]);

        User::create([
            'username' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('123'),
            'role' => 'user',
            'first_name' => 'Anna',
            'last_name' => 'Nowak',
            'address' => 'ul. Leśna 5, Gdańsk',
        ]);

        User::create([
            'username' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('123'),
            'role' => 'user',
            'first_name' => 'Piotr',
            'last_name' => 'Wiśniewski',
            'address' => 'ul. Słoneczna 3, Poznań',
        ]);
    }
}
