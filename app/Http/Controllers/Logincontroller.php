<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Logincontroller extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function daftar(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }

        $simpan = DB::table('logins')->insert([
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => Hash::make($r->password),
        ]);

        if ($simpan == TRUE) {
            return redirect('/')->with('succes', 'Data Berhasil Disimpan');
        } else {
            return redirect('register')->with('error', 'Data gagal Disimpan');
        }
    }

    public function aksilogin(Request $r)
    {
        $login = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('login')->attempt(['username' => $r->username, 'password' => $r->password])) {
            $r->session()->regenerate();
            return redirect('home');
        }

        return back();
    }

    public function logout(Request $r)
    {
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
}
