<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \App\Mail\ResetPassword;
use \App\PasswordReset;
use \App\User;

class ResetPasswordController extends Controller
{
    //
    public function index(){
        // dd();
        return view('pages.resetpassword');
    }

    public function reset(Request $req){
        $this->validate(request(),[
            'email' => 'required|email|exists:users'
        ]);
        $usert = User::where('email',$req->input('email'))->first();
        // dd($usert);
        $user = PasswordReset::where('email',$req->input('email'))->first();   
        // dd($user);
        $user->token = bin2hex(random_bytes(15));
        $user->created_at = Carbon::now()->timestamp;
        $user->save();
        $token = $user->token;
        $email = $usert->email;
        // dd($user);
        \Mail::to($usert)->send(new ResetPassword($token,$email));
        session()->flash('message','Check your email to reset the password');
        return view('session.create');
    }

    public function verify($tokenemail){
        $token = explode('&',($tokenemail))[0];
        $email = explode('&',($tokenemail))[1];
        $record = PasswordReset::where('token',$token)->first();
        if(!$record)
        {
            return redirect('/pagenotfound');
        }
        $presentDay = Carbon::now()->toDateTimeString();
        $datetime1 = strtotime($presentDay); // convert to timestamps
        $datetime2 = strtotime($record->created_at); // convert to timestamps
        $days = (int)(($datetime1 - $datetime2)/86400);
        if($days>0){
            return redirect('/pagenotfound');
        }
        else{
            return view('pages.changePassword',compact('email'));
        }
    }
}

