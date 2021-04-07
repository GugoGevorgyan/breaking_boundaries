<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\CreateRequest;
use App\Http\Requests\Type\UpdateRequest;
use App\Models\Type;
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
        $type = Type::all();
        return response()->json($type);
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
        $result = $this->typeService->create($request);
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
     * @param Type $type
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Type $type)
    {
        $result = $this->typeService->getTeamType($type->id);
        return response()->json($result);
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
        $result = $this->typeService->update($request, $type);
        return response()->json([$result]);
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
        $result = $this->typeService->delete($type);
        return response()->json([$result]);
    }
}
