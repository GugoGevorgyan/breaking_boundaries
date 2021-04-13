<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Response\APIResponse;
use App\Services\RegisterService;

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
     * create User
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(RegisterRequest $request)
    {
        return APIResponse::successResponse(new RegisterResource($this->registerService->register($request)));

    }
}
