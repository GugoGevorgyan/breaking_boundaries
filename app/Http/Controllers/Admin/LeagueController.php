<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\League\CreateRequest;
use App\Http\Requests\League\UpdateRequest;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use App\Response\APIResponse;
use App\Services\LeagueService;

class LeagueController extends Controller
{
    /**
     * @var LeagueService
     */
    private LeagueService $leagueService;

    /**
     * ClubController constructor.
     * @param LeagueService $leagueService
     */

    public function __construct(LeagueService $leagueService)
    {
        $this->leagueService = $leagueService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(LeagueResource::collection($this->leagueService->allLeague()));
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
        return APIResponse::successResponse(new LeagueResource($this->leagueService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(League $league)
    {
        return APIResponse::successResponse(new LeagueResource($this->leagueService->getLeague($league->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(League $league)
    {
        return APIResponse::successResponse(new LeagueResource($this->leagueService->getLeague($league->id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param League $league
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, League $league)
    {
        return APIResponse::successResponse(new LeagueResource($this->leagueService->update($request, $league)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\League $league
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(League $league)
    {
        return APIResponse::successResponse(new LeagueResource($this->leagueService->delete($league)));
    }
}
