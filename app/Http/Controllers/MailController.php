<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MailController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($code)
    {
        $user = User::where('remember_token', $code)->first();
        if ($user){
            $user_id = User::where('remember_token', $code)->first()->id;

            //tanel password confirmi dasht;
            return response()->json(['$user_id' => $user_id]);
        }
        abort(403, 'Unauthorized action.');
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $adminData = [
            'email' => $request->email,
            'password'=> $request->password,
        ];
        if (!auth()->attempt($adminData)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $rules = [
            'password_new' => 'required|string|min:4|same:password_confirmation',
        ];

        $this->validate($request, $rules);
        $user = User::find($id);
            $user -> update([
                'password' => Hash::make($request->password_new),
                'status' => 1,
                'email_verified_at' => now(),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        $login = new LoginController();
        $userToken = $login->store($request);
        return $userToken;
//            return response()->json(['message' => 'your password has been changed',$userToken]);
//        }
//        return response()->json(['message' => 'Your password was incorrect']);
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
}
