<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CreateRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Response\APIResponse;
use App\Services\CityService;

class CityController extends Controller
{
    /**
     * @var CityService $cityService
     */
    private CityService $cityService;

    /**
     * CityController constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(CityResource::collection($this->cityService->allCity()));
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
        return APIResponse::successResponse(new CityResource($this->cityService->create($request)));

    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(City $city)
    {
        return APIResponse::successResponse(new CityResource($this->cityService->getCity($city->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(City $city)
    {
        return APIResponse::successResponse(new CityResource($this->cityService->getCity($city->id)));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, City $city)
    {
        return APIResponse::successResponse(new CityResource($this->cityService->update($request, $city)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        return APIResponse::successResponse(new CityResource($this->cityService->delete($city)));
    }
}
