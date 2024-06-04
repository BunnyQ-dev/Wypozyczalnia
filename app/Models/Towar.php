<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towar extends Model
{
    use HasFactory;

    protected $table = 'towar';
    protected $fillable = ['kategoria_id', 'nazwa', 'opis', 'cena', 'zdjecie1','zdjecie2','zdjecie3'];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    public function wypozyczenia()
    {
        return $this->hasMany(Wypozyczenia::class);
    }
    public function index()
    {
        $towar = Towar::all();
        return view('towar.index', compact('towar'));
    }
}
