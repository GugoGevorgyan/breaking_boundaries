<?php


namespace App\Repositories;

use App\Models\Season;

class SeasonRepository extends Repository
{
    protected array $fillable = [
        'name'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Season::class;
    }

}
