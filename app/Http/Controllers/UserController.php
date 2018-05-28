<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->back();
        }
    }
    public function postRegister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();
        return redirect()->route('shop.index');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
