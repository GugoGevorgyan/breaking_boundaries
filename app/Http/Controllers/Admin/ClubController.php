<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Club\CreateRequest;
use App\Http\Requests\Club\UpdateRequest;
use App\Http\Requests\ClubRequest;
use App\Models\Club;
use App\Services\ClubService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $result = $this->clubService->allClub();
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
    public function store(CreateRequest $request)
    {

        $result = $this->clubService->create($request);
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
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Club $club)
    {
        $result = $this->clubService->getClub($club->id);
        return response()->json([$result]);
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
        $result = $this->clubService->update($request,$club);
        return response()->json([$result]);

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
        $result = $this->clubService->delete($club);
        return response()->json([$result]);
//        $name = $club->name;
//        $club->delete();
//        return response()->json(['message' => 'you have successfully removed ' . $name . ' club ']);
    }
}
