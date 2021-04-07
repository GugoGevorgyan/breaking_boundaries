<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function games(){
        return $this->belongsToMany(Game::class)->withPivot('points');
    }

}
