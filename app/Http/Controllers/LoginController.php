<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Go To Login Page
     *
     * @return void
     */

    public function login()
    {
        return view('auth.login');
    }

    /**
     * User Auth check here
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return void
     */

    public function loginStore(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        //  dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
            //  ->with('success', 'You have Successfully loggedin....')
        }
        return redirect()->back()->with('error', 'You Have Entered  Wrong Credentials....');
    }
}
