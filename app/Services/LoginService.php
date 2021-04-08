<?php


namespace App\Services;


use App\Http\Requests\Auth\LoginRequest;
use App\Response\APIResponse;

class LoginService
{
    public static function login($request)
    {

        if (!auth()->attempt($request->only(['email','password']))) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        return auth()->user()->createToken('authToken');

    }

}
