<?php


namespace App\Services;

use App\Exceptions\LoginException;
use App\Models\Team;
use App\Models\User;
use App\Repositories\USerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class RegisterService
{
    /**
     * @var USerRepository
     */
    protected $registerRepository;

    /**
     * TeamService constructor.
     * @param USerRepository $registerRepository
     */

    public function __construct(USerRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * @param $request
     * @return mixed
     * @throws \App\Exceptions\LoginException
     */

    public function register($request){
        $user = $request->only('name', 'email', 'age', 'phone','password','team_id');
        $user['password'] = Hash::make($user['password']);
        $user['status'] = 0;
        $team =  Team::findOrFail($request->team_id);
        $result = $this->registerRepository->create($user);
        $result->team()->attach($team->id);
        return LoginService::login($request);
    }

    /**
     * @param $website
     * @throws LoginException
     */
    public function socialiteCallback($website){
        $social_user = Socialite::driver($website)
            ->stateless()
            ->user();
        dd($social_user);
        $user = $this->registerRepository->get(['email'=> $social_user->email])->first();
        if(!$user) {
            $user = [
                    'email' => $social_user->email,
                    'name' => $social_user->name ?? $social_user->nickname,
                    'image' => $social_user->avatar,
                    'password' => Str::random(10)
                ];
            dd($user);
//            try {
//               return $this->register($user);
//            } catch (LoginException $e) {
//                throw new LoginException($e);
//            }

        }

//        Auth::login($user);
    }
}
