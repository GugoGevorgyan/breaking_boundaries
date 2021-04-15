<?php


namespace App\Services;


use App\Exceptions\LoginException;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Response\APIResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
