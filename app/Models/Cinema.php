<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
}
