<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthenticationController extends Controller
{
    public function resetPassword(){

    }


    public function sendPasswordResetToken(Request $request){

//        return response()->json([$request]);
        $rules = [
          'email' => 'required|email|exists:users,email'
        ];
        $validator = Validator::make($request->all(), $rules);

//        if ($validator->false()){
//            return $this->errorMessage(true, $validator->errors()->all());
//        }
        $data = $validator->validated();
        $user = User::where('email', $data['email'])->first();
        $reset_link_send = $user->sendPasswordResetLink();
        return response()->json([$reset_link_send]);
        if($reset_link_send){
            return $this->errorMessage(false,' a password reset token has been sent to your email,
            please enter the password reset page to reset your password');
        }
        return $this->errorMessage(true,$user->getErrorMessage());

    }


    public function setNEwAccountPassword(){

    }

}
