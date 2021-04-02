<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * @var AdminService $adminService
     */
    private AdminService $adminService;

    /**
     * AdminController constructor.
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request,User $admin)
    {
            $result = $this->adminService->update($request, $admin);
            return response()->json([$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $admin)
    {
        $result = $this->adminService->delete($admin);
        return response()->json([$result]);

    }
}
