<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Models\Team;
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
        $result = $this->teamService->getAllTeam();
        return response()->json([$result]);

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
        $result = $this->teamService->create($request);
        return response()->json([$result]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Team $team)
    {
        $result = $this->teamService->getTeam($team->id);
        return response()->json($result);
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
        $result = $this->teamService->update($request, $team);
        return response()->json([$result]);
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
        $result = $this->teamService->delete($team);
        return response()->json([$result]);
    }

}
