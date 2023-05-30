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
        $user_name = Auth::user()->name;
        $totalUser = user::count();
        if (Auth::check()) {
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

        $user = Auth::user();

        if ($user->role_id   == 1) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->role_id   == 2) {
            return redirect()->route('manager');
        } elseif ($user->role_id   == 3) {
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
        return redirect('/')->with('success', ' You have successfully logged out...');
    }
}
