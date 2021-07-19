<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\CreateRequest;
use App\Http\Requests\Type\UpdateRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use App\Response\APIResponse;
use App\Services\TypeService;

class TypeController extends Controller
{
    /**
     * @var TypeService $typeService
     */
    private TypeService $typeService;

    /**
     * TeamController constructor.
     * @param TypeService $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(TypeResource::collection($this->typeService->allType()));
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
        return APIResponse::successResponse(new TypeResource($this->typeService->create($request)));

    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Type $type)
    {
        return APIResponse::successResponse(new TypeResource($this->typeService->getType($type->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Type $type)
    {
        return APIResponse::successResponse(new TypeResource($this->typeService->getType($type->id)));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Type $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Type $type)
    {
        return APIResponse::successResponse(new TypeResource($this->typeService->update($request, $type)));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(Type $type)
    {
        return APIResponse::successResponse(new TypeResource($this->typeService->delete($type)));
//        $result = $this->typeService->delete($type);
//        return new TypeResource($result);
    }

}
