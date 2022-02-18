<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sanatorium;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            return redirect()->route('web.main.page');
        }
        return view('web.auth.login');
    }

    public function check(Request  $request)
    {

        //TODO send random sms code
        $code = 1234;

        Cache::put($code,$request->get('phone'),$seconds = 60);

        return  view('web.auth.verify',['phone' => $request->get('phone')]);
    }

    public function auth(Request $request)
    {

        $phone = Cache::get($request->get('code'));

        if (!$phone){
            return  redirect()->route('web.auth.login');
        }

        $user = User::wherePhone($phone)->first();
        if (!$user){
            $user = new User();
            $user->phone = $phone;
            $user->save();
        }
        Auth::login($user,true);
        return  redirect()->route('web.main.page');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('web.main.page');
    }
}
