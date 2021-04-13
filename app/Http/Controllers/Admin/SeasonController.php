<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Season\CreateRequest;
use App\Http\Requests\Season\UpdateRequest;
use App\Http\Resources\SeasonResource;
use App\Models\Season;
use App\Response\APIResponse;
use App\Services\SeasonService;

class SeasonController extends Controller
{

    /**
     * @var SeasonService $seasonService
     */
    private SeasonService $seasonService;

    /**
     * CityController constructor.
     * @param SeasonService $seasonService
     */

    public function __construct(SeasonService $seasonService)
    {
        $this->seasonService = $seasonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(SeasonResource::collection($this->seasonService->allSeason()));
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
        return APIResponse::successResponse(new SeasonResource($this->seasonService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Season $season)
    {
        return APIResponse::successResponse(new SeasonResource($this->seasonService->getSeason($season->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Season $season)
    {
        return APIResponse::successResponse(new SeasonResource($this->seasonService->getSeason($season->id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Season $season)
    {
        return APIResponse::successResponse(new SeasonResource($this->seasonService->update($request, $season)));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Season $season)
    {
        return APIResponse::successResponse(new SeasonResource($this->seasonService->delete($season)));
    }
}
