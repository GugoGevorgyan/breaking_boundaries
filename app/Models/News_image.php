<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_image extends Model
{
    use HasFactory;

    public function news(){
        return $this->belongsTo(News::class);
    }
}
