<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wypozyczenia extends Model
{
    use HasFactory;

    protected $table = 'wypozyczenia'; // Nazwa tabeli w bazie danych
    protected $fillable = ['user_id', 'towar_id', 'data_wypozyczenia', 'data_zwrotu']; // Kolumny, które mogą być zapełniane masowo

    // Relacja z modelem User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacja z modelem Towar
    public function towar()
    {
        return $this->belongsTo(Towar::class);
    }
}
