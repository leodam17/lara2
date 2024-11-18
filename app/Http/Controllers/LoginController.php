<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }

    public function authenticate(Request $r){
        $credentials = $r->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $r->session()->regenerate();
            return redirect()->route('joki');
        }

        return back()->with('error','gagal login');
    }

    public function logout(Request $r)
    {
        Auth::logout();

        $r->session()->invalidate();

        $r->session()->regenerateToken();

        return redirect()->route('login.index');
    }

    public function request_to_api(Request $r)
    {
        $respon_api = Http::get('http://127.0.0.1:8000/api/get/pelanggan/3');
    }
}
