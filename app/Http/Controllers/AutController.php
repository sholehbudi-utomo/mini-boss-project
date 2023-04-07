<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AutController extends Controller
{
    public function register(Request $request) {

        return view('aut.register');
    }

    public function login(Request $request) {
        return view('aut.login');
    }

    public function doRegister(Request $request) 
    {
        $validated= $request->validate([
            'name'=>['required','string','max:100'],
            'user_name'=>['required','string','max:100','unique:'.User::class],
            'email'=> ['required','string','email','unique:'.User::class],
            'password'=> ['required','confirmed',Rules\Password::default()],
        ]);

        $user=User::create([
            'name'=>$validated['name'],
            'user_name'=>$validated['user_name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
        ]);
        Auth::login($user);
        Session::flush('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login');
    }

    public function doLogin(Request $request) {
        $credential= $request->validate([
            'email'=> ['required','string','email'],
            'password'=> ['required',Rules\Password::default()],
        ]);
        if(Auth::attempt($credential)){

            $request->session()->regenerateToken();
            return redirect()->intended('/categori');

        } else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/ ');
        }

    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/register');

    }
}
