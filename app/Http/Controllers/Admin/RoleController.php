<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Response\APIResponse;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private RoleService $roleService;

    /**
     * ClubController constructor.
     * @param RoleService $roleService
     */

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(RoleResource::collection($this->roleService->allRole()));
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
        return APIResponse::successResponse(new RoleResource($this->roleService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Role $role)
    {
        return APIResponse::successResponse(new RoleResource($this->roleService->getRole($role->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Role $role)
    {
        return APIResponse::successResponse(new RoleResource($this->roleService->getRole($role->id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(UpdateRequest $request, Role $role)
    {
        return APIResponse::successResponse(new RoleResource($this->roleService->update($request,$role)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        return APIResponse::successResponse(new RoleResource($this->roleService->delete($role)));
    }
}
