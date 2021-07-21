<?php


namespace App\Repositories;

use App\Models\News_image;

class NewsImageRepository extends Repository
{
    protected array $fillable = [
        'image', 'news_id','admin_id'
    ];

    /**
     * @return mixed|string
     */
    public function model(): string
    {
        return News_image::class;
    }

}
