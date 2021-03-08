<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\user_address;
use Auth;

class AddressController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        // dd('hello');
        $states = DB::table('states')->get()->toArray();
        // dd($states);
        return view('pages.address',compact('states'));
    }

    public function saveAddress(Request $req){
        // dd($req->input());
        $this->validate(request(),[
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required'
        ]);
        // dd(Auth::user()->id);
        $result = user_address::where('user_id',Auth::user()->id)->first();
        if($result)
        {
            $result->addressline1 =  $req->input('address');
            $result->state = $req->input('state');
            $result->country = $req->input('country');
            $result->zipcode = $req->input('zip');
            $result->save();
            return redirect('/profile');
        }
        else
        {
            user_address::create([
                'user_id'=>Auth::user()->id,
                'addressline1'=>$req->input('address'),
                'state'=>$req->input('state'),
                'country'=>$req->input('country'),
                'zipcode'=>$req->input('zip')
            ]);
            return redirect('/userCart');
        }
    }
}
