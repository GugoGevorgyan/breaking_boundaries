<?php


namespace App\Repositories;

use App\Models\City;
use App\Models\Game;

class GameRepository extends Repository
{
    protected array $fillable = [
        'league_id','start_date','end_date'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Game::class;
    }

}
