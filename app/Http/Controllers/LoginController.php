<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(Request $req){
       $userdata=User::where('email','=',$req->email)->first();
       if(!$userdata || !Hash::check($req->password,$userdata->password)){
            return 'username or password does not match';
       }
       else{
        //    return 'welcome to home page';
        $req->session()->put('user',$userdata);
        return redirect('/');
       }
    }
    function register(Request $req){
        $user=New User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return redirect('/login');
    }
}
