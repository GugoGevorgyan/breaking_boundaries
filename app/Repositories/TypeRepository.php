<?php


namespace App\Repositories;

use App\Models\Type;

class TypeRepository extends Repository
{
    protected array $fillable = [
        'name', 'criteria'
    ];

    /**
     * @return mixed|string
     */

    public function model(): string
    {
        return Type::class;
    }

}
