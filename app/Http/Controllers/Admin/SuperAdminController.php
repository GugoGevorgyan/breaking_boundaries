<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAdminRequest;
use App\Mail\Breaking_boundaries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserAdminRequest $request)
    {
        $code = Str::random(10) . time();

        $toEmail = $this->send($code, $request['email'], $request['password']);
        if ($toEmail === "ok") {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'age' => $request['age'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password']),
                'role_id' => 2,
                'remember_token' => $code,
            ]);
            return response()->json(['message' => 'The admin successfully created'],200);
        }
        return response()->json(['error' => $toEmail->getMessage()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * sending SMS to the admin's mail
     *
     * @param  \App\Http\Controllers\Admin\  $code
     * @param    $email
     * @param    $password
     * @return \Illuminate\Http\Response
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
