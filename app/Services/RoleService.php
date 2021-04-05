<?php


namespace App\Services;


use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Repositories\TeamRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class RoleService
{
    /**
     * @var TeamRepository
     */
    protected $roleRepository;

    /**
     * TeamService constructor.
     * @param RoleRepository $roleRepository
     */

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        return $this->roleRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param Role $team
     * @return Model
     */

    public function update(UpdateRequest $request, Role $team)
    {
        return $this->roleRepository->update($request->all(), $team);
    }

    /**
     * @param Role $role
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Role $role)
    {
        if (Gate::allows('isSuperAdmin')) {
            return $this->roleRepository->delete($role);
        }
        return false;
    }



}
