<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Response\APIResponse;
use App\Services\RegisterService;
use Laravel\Socialite\Facades\Socialite;

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

    /**
     * @param $website
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function socialites($website)
    {

        return Socialite::driver($website)->stateless()->redirect();
    }

    /**
     * @param $website
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\LoginException
     */

    public function socialiteCallback($website)
    {
        return APIResponse::successResponse(new RegisterResource($this->registerService->socialiteCallback($website)));
    }
}
