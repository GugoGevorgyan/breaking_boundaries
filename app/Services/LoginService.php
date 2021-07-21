<?php


namespace App\Services;


use App\Exceptions\LoginException;
use Illuminate\Support\Arr;

class LoginService
{
    public static function login($request)
    {
        $login = gettype($request) === "array" ? Arr::only($request, ['email','password']) :
            $request->only( 'email', 'password',);

        if (auth()->attempt($login)) {
            return auth()->user()->createToken('authToken');
        }
        throw new LoginException('invalid credentials', 401);
    }

}
