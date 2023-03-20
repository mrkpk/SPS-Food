<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (session::has('login')) {
            return redirect('/admin');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            Session::put('id_user', $user->id_admin);
            Session::put('login', TRUE);
            return redirect('/');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
