<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    use HasFactory;

    protected $table = 'kategoria'; // Nazwa tabeli w bazie danych
    protected $fillable = ['nazwa']; // Kolumny, które mogą być zapełniane masowo
}
