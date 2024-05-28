<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towar extends Model
{
    use HasFactory;

    protected $table = 'towar'; // Nazwa tabeli w bazie danych
    protected $fillable = ['kategoria_id', 'nazwa', 'opis', 'cena']; // Kolumny, które mogą być zapełniane masowo

    // Relacja z modelem Kategoria
    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    // Relacja z modelem Wypozyczenia
    public function wypozyczenia()
    {
        return $this->hasMany(Wypozyczenia::class);
    }
}
