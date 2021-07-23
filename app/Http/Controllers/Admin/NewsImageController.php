<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News_image\CreateRequest;
use App\Http\Requests\News_image\UpdateRequest;
use App\Models\News_image;
use Illuminate\Http\Request;

class NewsImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News_image  $news_image
     * @return \Illuminate\Http\Response
     */
    public function show(News_image $news_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News_image  $news_image
     * @return \Illuminate\Http\Response
     */
    public function edit(News_image $news_image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News_image  $news_image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News_image $news_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News_image  $news_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(News_image $news_image)
    {
        //
    }
}
