<?php


namespace App\Repositories;

use App\Models\Team_type;

class TeamTypeRepository extends Repository
{
    protected array $fillable = [
        'name', 'criteria'
    ];

    /**
     * @return mixed|string
     */

    public function model(): string
    {
        return Team_type::class;
    }

}
