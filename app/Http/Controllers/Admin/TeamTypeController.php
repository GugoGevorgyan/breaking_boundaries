<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamTypeRequest;
use App\Http\Requests\Team\TeamTypeUpdateRequest;
use App\Models\Team_type;
use App\Services\TeamService;
use App\Services\TeamTypeService;
use Illuminate\Http\Request;

class TeamTypeController extends Controller
{
    /**
     * @var TeamTypeService $teamTypeService
     */
    private TeamTypeService $teamTypeService;

    /**
     * TeamController constructor.
     * @param TeamTypeService $teamTypeService
     */
    public function __construct(TeamTypeService $teamTypeService)
    {
        $this->teamTypeService = $teamTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $team_type = Team_type::all();
        return response()->json($team_type);
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
    public function store(TeamTypeRequest $request)
    {
        $result = $this->teamTypeService->create($request);
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
     * @param Team_type $teamType
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Team_type $teamType)
    {
        $result = $this->teamTypeService->getTeamType($teamType->id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamTypeUpdateRequest $request
     * @param Team_type $teamType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TeamTypeUpdateRequest $request, Team_type $teamType)
    {
        $result = $this->teamTypeService->update($request, $teamType);
        return response()->json([$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team_type $teamType
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(Team_type $teamType)
    {
        $result = $this->teamTypeService->delete($teamType);
        return response()->json([$result]);
    }
}
