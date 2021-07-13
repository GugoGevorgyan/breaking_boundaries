<?php


namespace App\Services;

use App\Exceptions\LoginException;
use App\Models\Team;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Arr;

class RegisterService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $registerRepository;

    /**
     * TeamService constructor.
     * @param UserRepository $registerRepository
     */

    public function __construct(UserRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * @param $request
     * @return mixed
     * @throws \App\Exceptions\LoginException
     */

    public function register($request)
    {
        $user = gettype($request) === "array" ? Arr::only($request, ['name', 'email', 'age', 'phone', 'password', 'team_id']) :
            $request->only('name', 'email', 'age', 'phone', 'password', 'team_id');
//        $user = $request->only('name', 'email', 'age', 'phone','password','team_id');
//dd($user,"ff");
        $user['password'] = Hash::make($user['password']);
        $user['status'] = 0;
        $team = Team::findOrFail($request['team_id']);

        $result = $this->registerRepository->create($user);
        $this->registerRepository->createPivot($result, 'team', $team->id);
        return LoginService::login($request);
    }

    /**
     * @param $website
     * @throws LoginException
     */
    public function socialiteCallback($website)
    {
        $social_user = Socialite::driver($website)
            ->stateless()
            ->user();
        $user = $this->registerRepository->get(['email' => $social_user->email])->first();
        if (!$user) {
            $user = [
                'email' => $social_user->email,
                'name' => $social_user->name ?? $social_user->nickname,
                'image' => $social_user->avatar ?? "",
                'password' => Str::random(10),
                'team_id' => 3,   //
                'phone' => 45454545, //
                'age' => 15 //


            ];
            try {
                return $this->register($user);
            } catch (LoginException $e) {
                throw new LoginException($e);
            }

        }
         auth()->login($user);
        return auth()->user()->createToken('authToken');
    }
}
