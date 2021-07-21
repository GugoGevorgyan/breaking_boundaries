<?php


namespace App\Repositories;

use App\Models\Blog;

class BlogRepository extends Repository
{
    protected array $fillable = [
        'link', 'title', 'description', 'view'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return Blog::class;
    }

}
