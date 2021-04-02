<?php


namespace App\Repositories;

use App\Models\Club;

class ClubRepository extends Repository
{
    protected array $fillable = [
        'name','image'
    ];

    /**
     * @return mixed|string
     */

    public function model(): string
    {
        return Club::class;
    }

}
