<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * To Go To The Register Page
     *
     * @return void
     */
    public function register()
    {
        return view('auth.register');
    }


    /**
     * To Store Register Details
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return void
     */
    public function registerStore(RegisterRequest $request)
    {
        $user = new User();
        $user->role_id = 3;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('Login')->with('success', 'Successfully Registered....');
    }
}
