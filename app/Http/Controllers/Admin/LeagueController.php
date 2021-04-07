<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\League\CreateRequest;
use App\Http\Requests\League\UpdateRequest;
use App\Models\League;
use App\Services\LeagueService;
use Illuminate\Http\Request;

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
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $result = $this->leagueService->create($request);
        return response()->json([$result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        //
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
        $result = $this->leagueService->update($request, $league);
        return response()->json([$result]);
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
        $result = $this->leagueService->delete($league);
        return response()->json([$result]);
    }
}
