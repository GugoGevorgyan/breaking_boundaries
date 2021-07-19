<?php


namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends Repository
{
    protected array $fillable = [
        'name'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Role::class;
    }

}
