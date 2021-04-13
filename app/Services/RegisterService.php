<?php


namespace App\Services;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Team;
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
        $user = $request->only('name', 'email', 'age', 'phone','password','team_id');

        $user['password'] = Hash::make($user['password']);
        $user['status'] = 0;
        $team =  Team::findOrFail($request->team_id);
        $result = $this->registerRepository->create($user);
        $result->team()->attach($team->id);
        return LoginService::login($request);
    }
}
