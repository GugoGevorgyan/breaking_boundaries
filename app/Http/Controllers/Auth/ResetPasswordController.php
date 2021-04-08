<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;


    /**
     * @param Request $request
     * @param $response
     * @return Application|ResponseFactory|\Illuminate\Http\Response
     */
    protected function sendResetResponse(Request $request, $response): Response
    {
        return response(['message' => trans($response)]);
    }


    protected function sendResetFailedResponse(Request $request, $response):Response
    {
        return response(['error'=>trans($response)],Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
