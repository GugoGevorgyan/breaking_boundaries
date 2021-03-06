<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function games(){
        return $this->hasMany(Game::class);
    }

}
