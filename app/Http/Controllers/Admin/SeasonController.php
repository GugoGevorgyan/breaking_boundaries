<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Season\CreateRequest;
use App\Http\Requests\Season\UpdateRequest;
use App\Models\Season;
use App\Services\SeasonService;
use Illuminate\Http\Request;

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
        $result = $this->seasonService->create($request);
        return response()->json([$result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
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
        $result = $this->seasonService->update($request, $season);
        return response()->json([$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Season $season)
    {
        $result = $this->seasonService->delete($season);
        return response()->json([$result]);
    }
}
