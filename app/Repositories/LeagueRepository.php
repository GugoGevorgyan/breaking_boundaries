<?php


namespace App\Repositories;

use App\Models\League;

class LeagueRepository extends Repository
{
    protected array $fillable = [
        'name','year','season_id',
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return League::class;
    }

}
