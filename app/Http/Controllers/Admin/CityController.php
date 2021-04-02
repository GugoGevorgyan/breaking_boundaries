<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CreateRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;
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
        $result = $this->cityService->allCity();
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
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $result = $this->cityService->create($request);
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
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(City $city)
    {
        $result = $this->cityService->getCity($city->id);
        return response()->json([$result]);
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
        $result = $this->cityService->update($request, $city);
        return response()->json([$result]);
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
        $result = $this->cityService->delete($city);
        return response()->json([$result]);
    }
}
