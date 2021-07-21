<?php


namespace App\Repositories;

use App\Models\News;

class NewsRepository extends Repository
{
    protected array $fillable = [
        'link', 'title', 'description', 'view'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return News::class;
    }

}
