<?php


namespace App\Repositories;

use App\Models\User;

class USerRepository extends Repository
{
    protected array $fillable = [
        'name', 'email', 'age', 'phone','status','role_id','password','email_verified_at','image','remember_token',
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return User::class;
    }

}
