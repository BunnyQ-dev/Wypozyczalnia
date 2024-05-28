<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towar extends Model
{
    use HasFactory;

    protected $table = 'towary';
    protected $fillable = ['kategoria_id', 'nazwa', 'opis', 'cena'];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    public function wypozyczenia()
    {
        return $this->hasMany(Wypozyczenia::class);
    }
}
