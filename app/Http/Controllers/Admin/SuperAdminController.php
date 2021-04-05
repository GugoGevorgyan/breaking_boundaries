<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Breaking_boundaries;
use App\Models\User;
use App\Services\SuperAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(RegisterRequest $request)
    {
        $result = $this->superAdminService->create($request);
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
     * @param Request $request
     * @param User $admin
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, User $admin)
    {
        $result = $this->superAdminService->update($request, $admin);
        return response()->json([$result]);
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
