<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Auth\Events\Login;

// use App\Http\Controllers\RegisterController
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route for Login page//
Route::get('/', [LoginController::class, 'login'])->name('Login');

// Route to store Login//
Route::post('/login-user', [LoginController::class, 'loginStore'])->name('LoginStore');

// Route for Register page//
Route::get('/register', [RegisterController::class, 'register'])->name('Register');

// Route To Store Register User//
Route::post('/store', [RegisterController::class, 'registerStore'])->name('RegisterStore');

// Route for Dashboard//
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route To Redirect User According To There Roles//
Route::group(['middleware'  => ['auth']], function () {
    Route::group(['middleware' => ['user']], function () {
        Route::get('/home', function () {
            return view('index');
        })->name('home');

        // Route for Complaints//
        Route::get('/complaint', [ComplaintController::class, 'complaint'])->name('complaint');

        // Route To store Complaints//
        Route::post('/post-Complaints', [ComplaintController::class, 'postComplaints'])->name('post.complaints');

        // Route To Send Otp//
        Route::post('/send-otp', [ApplicationController::class, 'sendOtp'])->name('sendOtp');

        // Route To//
        Route::get('/verification/{id}', [ApplicationController::class, 'verification'])->name('verification');
    });

    Route::group(['middleware' => ['admin']], function () {

        // Route For Admin-Dahsboard //
        Route::get('/Admin-Dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Route To Delete //
        Route::delete('delete/{id}', [ComplaintController::class, 'delete'])->name('delete');

        // Route For Edit //
        Route::get('edit/{id}', [ComplaintController::class, 'edit'])->name('edit');

        // Route For Update //
        Route::put('update/{id}', [ComplaintController::class, 'update'])->name('update');
    });

    Route::group(['middleware' => ['manager']], function () {
        // Route For Manager //
        Route::get('/manager', [DashboardController::class, 'manager'])->name('manager');
    });

    // Route To View Complaint And Suggestion//
    Route::get('/view', [ComplaintController::class, 'view'])->name('view');
});


//Route for logout//
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
