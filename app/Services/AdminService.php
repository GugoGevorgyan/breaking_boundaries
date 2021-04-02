<?php


namespace App\Services;


use App\Http\Requests\Admin\UpdateRequest;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminService
{
    /**
     * @var AdminRepository
     */
    protected $adminRepository;

    /**
     * TeamService constructor.
     * @param AdminRepository $adminRepository
     */

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
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
     * @param User $admin
     * @return Model
     */

    public function update(UpdateRequest $request, User $admin)
    {
        if (Gate::allows('isSuperAdmin') || Auth::id() === $admin->id) {
            return $this->adminRepository->update($request->all(), $admin);
        }
    }

    /**
     * @param User $admin
     * @return bool|null
     * @throws \Exception
     */

    public function delete(User $admin)
    {
        if (Gate::allows('isSuperAdmin') && $admin->id !== '1') {

            return $this->adminRepository->delete($admin);
        }

        return false;
    }

}
