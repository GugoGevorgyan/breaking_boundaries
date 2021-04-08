<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Response\APIResponse;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /**
     * @var RegisterService $registerService
     */
    private RegisterService $registerService;

    /**
     * TeamController constructor.
     * @param RegisterService $registerService
     */
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegisterRequest $request)
    {
        return APIResponse::successResponse(new RegisterResource($this->registerService->register($request)));

//        $user = new User();
//        $user->name = $request['name'];
//        $user->email = $request['email'];
//        $user->age = $request['age'];
//        $user->phone = $request['phone'];
//        $user->password =  Hash::make($request['password']);
//        $user ->save();
//
//        $user->team()->attach($request->team_id);
//
//        $login = new LoginController();
//        $userToken = $login->store($request);
//        return $userToken;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
