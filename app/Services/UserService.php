<?php


namespace App\Services;


use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserService
{
    use ImgFile;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * TeamService constructor.
     * @param UserRepository $userRepository
     */

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function getAllUser()
    {
        return $this->userRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function getUser($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->userRepository->get($filters) : null;
    }

    /**
     *
     */

    public function create()
    {
      //
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return Model
     */

    public function update(UpdateRequest $request, User $user)
    {
        if (Auth::id() === $user->id) {
            if ($request->image && !empty($request->image)) {
                $file = $this->updateFile($request->image, $user, 'user');
                $request->image = $file;
                $newUser = $request->only('name', 'email','age','phone','password','image');
                $newUser['image'] = $file;
            }else{
                $newUser = $request->all();
            }
            return $this->userRepository->update($newUser, $user);
        }
    }

    /**
     * @param User $user
     * @return void
     */

    public function delete(User $user)
    {
        //
    }

}
