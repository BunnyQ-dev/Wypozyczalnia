<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wypozyczenia extends Model
{
    use HasFactory;

    protected $table = 'wypozyczenia';

    protected $fillable = [
        'user_id',
        'towar_id',
        'status',
        'payment_status',
        'cena_do_zaplaty',
        'data_wypozyczenia',
        'data_zwrotu'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function towar()
    {
        return $this->belongsTo(Towar::class);
    }
}
