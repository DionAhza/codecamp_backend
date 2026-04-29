<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function register(Request $request){
        $validate  = $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password' => 'required'

        ]);

        User::create($validate);
        return redirect()->back()->with('message','berhasil membuat akun');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
 
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect('/')->with('message','berhasil login');
        }else{
            return redirect()->back()->with('message','gagal login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('message','berhasil logout');
    }
}
