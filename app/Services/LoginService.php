<?php


namespace App\Services;


use App\Exceptions\LoginException;
use App\Http\Requests\Auth\LoginRequest;
use App\Response\APIResponse;

class LoginService
{
    public static function login($request)
    {
        if (auth()->attempt($request->only(['email','password']))) {
            return auth()->user()->createToken('authToken');
        }
        throw new LoginException('invalid credentials', 401);
    }

}
