<?php


namespace App\Repositories;

use App\Models\News_image;

class BlogImageRepository extends Repository
{
    protected array $fillable = [
        'image', 'blog_id','admin_id'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return News_image::class;
    }

}
