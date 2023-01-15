<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
    ];

    public function cinemas(){
        return $this->hasMany(Favorite::class);
    }
}
