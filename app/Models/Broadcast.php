<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_room',
        'id_movie',
        'The_date'
    ];

    protected $hidden = [
        '_token'
    ];
}
