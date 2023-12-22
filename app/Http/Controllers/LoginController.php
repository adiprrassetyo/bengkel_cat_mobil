<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $cek = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]); 

        if(Auth::attempt($cek))
        {
            $request->session()->regenerate();

            $pass = session()->put('decpassword',$request->password);
            
            return redirect()->intended('/profil');
        }

        return back()->with('LoginError','Login gagal, silahkan mencoba kembali !');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
