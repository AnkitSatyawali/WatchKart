<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;


class SessionsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest')->except(['destroy']);
    }

    public function create(){
        return view('session.create');
    }

    public function store(request $request){
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        //  dd($request->input('email'));
        // $user = User::find($request->input('email'));
        // dd($user);
        if(!auth()->attempt(request(['email','password'])))
        return back()->withErrors([
            'message' => 'Please check your credentionals'
        ]);
        return redirect('/');
        // return view('session.create');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }
}