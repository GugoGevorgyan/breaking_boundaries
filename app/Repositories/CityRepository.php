<?php


namespace App\Repositories;

use App\Models\City;

class CityRepository extends Repository
{
    protected array $fillable = [
        'name'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return City::class;
    }

}
