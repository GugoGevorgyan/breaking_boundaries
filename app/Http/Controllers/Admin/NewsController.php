<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Response\APIResponse;
use App\Services\NewsService;

class NewsController extends Controller
{

    /**
     * @var NewsService
     */
    public NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(NewsResource::collection($this->newsService->get()));
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
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        return APIResponse::successResponse(new NewsResource($this->newsService->create($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param News $news
     *  * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, News $news)
    {
        return APIResponse::successResponse(new NewsResource($this->newsService->update($request, $news)));

    }

    /**
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        return APIResponse::successResponse(new NewsResource($this->newsService->delete($news)));
    }
}
