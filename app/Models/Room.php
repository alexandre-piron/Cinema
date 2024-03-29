<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nb_rangees',
        'nb_sieges',
        'id_cinema'
    ];

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'id_cinema');
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
