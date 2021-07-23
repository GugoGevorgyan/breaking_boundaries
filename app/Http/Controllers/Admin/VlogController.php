<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vlog\CreateRequest;
use App\Http\Resources\VlogResource;
use App\Models\Vlog;
use App\Response\APIResponse;
use App\Services\VlogService;
use Illuminate\Http\Request;


class VlogController extends Controller
{

    /**
     * @var VlogService
     */
    public VlogService $vlogService;

    public function __construct(VlogService $vlogService)
    {
        $this->vlogService = $vlogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function index()
    {
       return APIResponse::successResponse(VlogResource::collection($this->vlogService->get()));
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
     */
    public function store(CreateRequest $request)
    {
       return APIResponse::successResponse(new VlogResource($this->vlogService->create($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vlog  $vlog
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Vlog $vlog)
    {
        return APIResponse::successResponse(new VlogResource($vlog));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vlog  $vlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Vlog $vlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vlog  $vlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vlog $vlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vlog $vlog
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Vlog $vlog)
    {
        return APIResponse::successResponse(new VlogResource($this->vlogService->delete($vlog)));
    }
}
