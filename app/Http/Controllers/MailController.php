<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EmailRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use App\Response\APIResponse;
use App\Services\AdminEmailService;

class MailController extends Controller
{
    /**
     * @var AdminEmailService $adminEmailService
     */
    private AdminEmailService $adminEmailService;

    /**
     * AdminController constructor.
     * @param AdminEmailService $adminEmailService
     */
    public function __construct(AdminEmailService $adminEmailService)
    {
        $this->adminEmailService = $adminEmailService;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmailRequest $request
     * //     * @param User $user
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmailRequest $request)
    {
        return APIResponse::successResponse(new LoginResource($this->adminEmailService->update($request)));
    }


}
