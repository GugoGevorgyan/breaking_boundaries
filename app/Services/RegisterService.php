<?php


namespace App\Services;

use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\USerRepository;
use Illuminate\Support\Facades\Hash;

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

    public function register(RegisterRequest $request){
        $user = $request->only('name', 'email', 'age', 'phone', 'password');

        $user['password'] = Hash::make($user['password']);
        $user['status'] = 1;

        $result = $this->registerRepository->create($user);
        $result->team()->attach($request->team_id);

        return LoginService::login($request);
    }
}
