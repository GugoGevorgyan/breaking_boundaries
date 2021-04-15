<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\AdminResource;
use App\Models\User;
use App\Response\APIResponse;
use App\Services\SuperAdminService;

class SuperAdminController extends Controller
{

    /**
     * @var SuperAdminService $superAdminService
     */
    private SuperAdminService $superAdminService;

    /**
     * TeamController constructor.
     * @param SuperAdminService $superAdminService
     */
    public function __construct(SuperAdminService $superAdminService)
    {
        $this->superAdminService = $superAdminService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return APIResponse::successResponse(AdminResource::collection($this->superAdminService->getAllUser()));
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
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\EmailException
     */

    public function store(RegisterRequest $request)
    {
        return APIResponse::successResponse(new AdminResource($this->superAdminService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(user $user)
    {
        return APIResponse::successResponse(new AdminResource($this->superAdminService->getUser($user ->id)));
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

    public function update(UpdateRequest $request, User $admin)
    {
        return APIResponse::successResponse(new AdminResource($this->superAdminService->update($request, $admin)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * sending SMS to the admin's mail
     *
     * @param string $code
     * @param    $email
     * @param    $password
     * @return \Illuminate\Http\Response
     */



//    public function status(Request $request, $id)
//    {
//        if (Gate::allows('isSuperAdmin') && $id != '1') {
//            $user = User::find($id);
//            if ($user) {
//                $status = $user->status === '1' ? 0 : 1;
//                $user->update([
//                    'status' => $status,
//                ]);
//                return response()->json(['message' => 'The admin successfully update status']);
//            }
//            return response()->json(['error' => 'oops, user not found']);
//        }
//        return response()->json(['error' => 'oops, something went wrong']);
//    }


}
