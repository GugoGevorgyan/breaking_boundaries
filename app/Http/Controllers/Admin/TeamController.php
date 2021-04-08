<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Response\APIResponse;
use App\Services\TeamService;

class TeamController extends Controller
{
    /**
     * @var TeamService $teamService
     */
    private TeamService $teamService;

    /**
     * TeamController constructor.
     * @param TeamService $teamService
     */
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(TeamResource::collection($this->teamService->getAllTeam()));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TeamRequest $request)
    {
        return APIResponse::successResponse(new TeamResource($this->teamService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Team $team)
    {
        return APIResponse::successResponse(new TeamResource($this->teamService->getTeam($team->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Team $team)
    {
        return APIResponse::successResponse(new TeamResource($this->teamService->getTeam($team->id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param TEam $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Team $team)
    {
        return APIResponse::successResponse(new TeamResource($this->teamService->update($request, $team)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(Team $team)
    {
        return APIResponse::successResponse(new TeamResource($this->teamService->delete($team)));
    }

}
