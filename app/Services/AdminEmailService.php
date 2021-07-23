<?php


namespace App\Services;


use App\Http\Requests\Admin\EmailRequest;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;

class AdminEmailService
{
    /**
     * @var AdminRepository
     */
    protected AdminRepository $adminEmailRepository;

    /**
     * TeamService constructor.
     * @param AdminRepository $adminEmailRepository
     */

    public function __construct(AdminRepository $adminEmailRepository)
    {
        $this->adminEmailRepository = $adminEmailRepository;
    }


    public function checkCode($code)
    {
        $admin = $this->adminEmailRepository->get(['remember_token' => $code]);
        if (empty($admin[0])) {
            throw new \Exception("oops, something went wrong");
        }
        return $admin[0];
    }

    /**
     * @param EmailRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(EmailRequest $request)
    {
        $admin = $this->checkCode($request->remember_token);
//        $user['password'] = Hash::make($request['password']);
        $user['status'] = 1;
        $user['email_verified_at'] = now();
        $user['remember_token'] = null;
        $this->adminEmailRepository->update($user, $admin,["email_verified_at","remember_token","status"]);
        return LoginService::login($request);
    }
}
