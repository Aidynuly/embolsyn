<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        if (session()->has('admin')){
            return redirect()->route('main');
        }
        if ($request['email'] == 'admin' && $request['password'] == 'admin') {
            session()->put('vK68TF23TfYKYDBZSCC9', 1);
            session()->put('admin', 1);
            session()->save();
            return redirect()->route('main');
        }
        else {
            if ($request['email'] == 'admin' && $request['password'] != 'admin') {
                return back()->withErrors('Пароль не верно');
            }
            if ($request['email'] != 'admin') {
                return back()->withErrors('Логин не верно');
            }
            return back()->withErrors('Логин или пароль не верно');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
