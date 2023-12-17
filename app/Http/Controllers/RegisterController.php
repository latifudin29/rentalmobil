<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth/ register');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'no_handphone' => $request->no_handphone,
            'sim' => $request->sim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => 1
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
