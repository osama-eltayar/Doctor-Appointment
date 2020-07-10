<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.login');
        }

        $credentials = $request->only(['email','password']);
        if ($this->guard()->attempt($credentials)) {
            return redirect('/appointments');
        } else {
            return back()->withInput($request->only('email'))
                        ->withError('data is invalid');
        }
    }
    public function guard()
    {
        return Auth::guard('admin');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
