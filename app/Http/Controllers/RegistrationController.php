<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ResetPassword;
use App\PasswordReset;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest')->except(['changePassword']);
    }

    public function create(){
        return view('registration.create');
    }

    public function store(request $request){
        $this->validate(request(),[
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);
        // dd($request->input());
        $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        // dd($password);
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$password
        ]);

        PasswordReset::create([
            'email'=>$request->input('email'),
            'token'=>bin2hex(random_bytes(15)),
            'created_at'=>Carbon::now()->timestamp
        ]);    
            // dd($user);
        auth()->login($user);
        
        session()->flash('message','You have registered successfuly');
            
        return redirect('/');
    }

    public function changePassword($email,Request $req){
        $this->validate(request(),[
            'password' => 'required|confirmed|min:8'
        ]);
        // dd($email);
        $user = User::where('email',$email)->first();
        if(!$user)
        {
            return redirect('/');
        }

        $user->password = password_hash($req->input('password'), PASSWORD_DEFAULT);

        $user->save();

        $resetUser = PasswordReset::where('email',$email)->first();

        $resetUser->token = bin2hex(random_bytes(15));

        $resetUser->created_at = Carbon::now()->timestamp;

        $resetUser->save();
        session()->flash('message','Password has been reset successfully');
        return view('session.create');
    }
}