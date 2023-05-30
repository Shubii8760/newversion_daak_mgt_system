<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{

    /**
     * Dashboard page
     *
     * @return void
     */

    public function dashboard()
    {
        $totalUser = user::count();

        $user_name = Auth::user()->name;
        if (Auth::check()) {
            // return view('Dashboard', compact('user_name', 'totalUser'))->with('success', 'You have Successfully loggedin....');
            session()->flash('success', 'You have successfully logged in.');
            return view('Dashboard', compact('user_name', 'totalUser'));
        }
    }

    /**
     *  Manager Dashboard/
     *
     * @return void
     */

    public function manager()
    {
        $user_name = Auth::user()->name;
        if (Auth::check()) {
            // return view('Dashboard', compact('user_name'))->with('success', 'You have Successfully loggedin....');
            session()->flash('success', 'You have successfully logged in.');
            return view('Dashboard', compact('user_name'));
        }
    }

    /**
     * Role Based Redirect
     *
     * @return void
     */

    public function index()
    {
        // dump(Auth::user());
        // dump(Auth::user()->role_id);
        $user = Auth::user();
        // dd($user);
        if ($user->role_id   == 1) { // Admin
            return redirect()->route('admin.dashboard');
        }
        if ($user->role_id   == 2) { // User
            return redirect()->route('manager');
        } elseif ($user->role_id   == 3){
            return redirect()->route('home')->with('success', 'You have successfully logged in.');
        }
    }


    /**
     * To logout
     *
     * @return void
     */

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
