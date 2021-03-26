<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_type extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
