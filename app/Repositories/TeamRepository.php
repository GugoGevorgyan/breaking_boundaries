<?php


namespace App\Repositories;

use App\Models\Team;

class TeamRepository extends Repository
{
    protected array $fillable = [
        'name', 'club_id', 'team_type_id', 'city_id','status'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Team::class;
    }

}
