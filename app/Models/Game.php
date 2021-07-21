<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot('points')->withTimestamps();
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

}
