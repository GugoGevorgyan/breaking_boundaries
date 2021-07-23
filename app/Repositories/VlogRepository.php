<?php


namespace App\Repositories;

use App\Models\Vlog;

class VlogRepository extends Repository
{
    protected array $fillable = [
        'title','link','admin_id','status'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Vlog::class;
    }

}
