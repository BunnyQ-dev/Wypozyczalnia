<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Towar;

class TowarPolicy
{
    public function view(User $user, Towar $towar)
    {
        return true; // Dla uproszczenia, każdy użytkownik może wyświetlać towary
    }

    public function create(User $user)
    {
        return $user->isAdmin(); // Tylko administratorzy mogą dodawać towary
    }

    public function update(User $user, Towar $towar)
    {
        return $user->isAdmin(); // Tylko administratorzy mogą edytować towary
    }

    public function delete(User $user, Towar $towar)
    {
        return $user->isAdmin(); // Tylko administratorzy mogą usuwać towary
    }
}
