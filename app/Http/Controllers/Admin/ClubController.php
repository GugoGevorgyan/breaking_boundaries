<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Club\CreateRequest;
use App\Http\Requests\Club\UpdateRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use App\Response\APIResponse;
use App\Services\ClubService;

class ClubController extends Controller
{
    /**
     * @var ClubService
     */
    private ClubService $clubService;

    /**
     * ClubController constructor.
     * @param ClubService $clubService
     */

    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(ClubResource::collection($this->clubService->allClub()));
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
    public function store(CreateRequest $request)
    {
        return APIResponse::successResponse(new ClubResource($this->clubService->create($request)));
//        $result = $this->clubService->create($request);
//        return new ClubResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Club $club)
    {
        return APIResponse::successResponse(new ClubResource($this->clubService->getClub($club->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Club $club)
    {
        return APIResponse::successResponse(new ClubResource($this->clubService->getClub($club->id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Club $club)
    {
        return APIResponse::successResponse(new ClubResource($this->clubService->update($request,$club)));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Club $club)
    {
        return APIResponse::successResponse(new ClubResource($this->clubService->delete($club)));
    }
}
