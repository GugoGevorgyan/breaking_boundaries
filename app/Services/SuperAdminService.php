<?php


namespace App\Services;


use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Breaking_boundaries;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SuperAdminService
{
    /**
     * @var AdminRepository
     */
    protected $superAdminService;

    /**
     * TeamService constructor.
     * @param AdminRepository $superAdminService
     */

    public function __construct(AdminRepository $superAdminService)
    {
        $this->superAdminService = $superAdminService;
    }

    /**
     * @param RegisterRequest $request
     * @return Model|mixed
     */

    public function create(RegisterRequest $request)
    {
        if (Gate::allows('isSuperAdmin')) {
            $code = Str::random(10) . time();
            $toEmail = $this->send($code, $request['email'], $request['password']);
            if ($toEmail === "ok") {
                $admin = $request->only('name', 'email', 'age', 'phone', 'password');
                $admin['password'] = Hash::make($admin['password']);
                $admin['role_id'] = 2;
                $admin['status'] = 0;
                $admin['remember_token'] = $code;
                return $this->superAdminService->create($admin);
            }
            return response()->json(['error' => $toEmail->getMessage()]);
        }
        return response()->json(['error' => 'oops, something went wrong, no SuperAdmin']);
    }

    /**
     * @param UpdateRequest $request
     * @param User $admin
     * @return Model
     */

    public function update(UpdateRequest $request, User $admin)
    {
        if (Gate::allows('isSuperAdmin') || Auth::id() === $admin->id) {
            return $this->superAdminService->update($request->all(), $admin);
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

            return $this->superAdminService->delete($admin);
        }

        return false;
    }

    /**
     * email
     *
     * @param $code
     * @param $email
     * @param $password
     * @return \Exception|string
     */
    public function send($code, $email, $password)
    {
        try {
            Mail::to($email)->send(new Breaking_boundaries($code, $password));
        } catch (\Exception $err) {
            return $err;
        }
        return 'ok';
    }

}