<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\Auth\Register;
use App\Http\Controllers\Home\Auth\Login;
use App\Http\Controllers\Home\Auth\Forget;
use App\Http\Controllers\Home\Auth\Verify;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});
Route::get('/about', function () {
    //return view('welcome');
    return view('about');
});

Route::middleware(['guest'])->group(function (){
    
    Route::get('/register', [Register::class, 'index'])->name('register');
    Route::post('/register', [Register::class, 'register']);

    Route::post('/register/verify', [Verify::class, 'verify'])->name('register.verify');

    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'login']);




    Route::get('/forget', [Forget::class, 'index'])->name('forget');
    Route::post('/forget', [Forget::class, 'forget']);

    Route::get('/forget/verify', [Forget::class ])->name('forgetVerify');
    Route::post('/forget/verify', [Forget::class, 'forgetVerify']);

    Route::post('/forget/resetpassword', [Forget::class, 'resetPassword'])->name('resetPassword');
});
Route::get('/logout', [Login::class,'logout'])->name('logout');

Route::get('/admin-dashboard', function () {
    return ('admin-dashboard');
})->middleware('admin')->name('admin.dashboard');
Route::get('/user-dashboard', function () {
    return ('user-dashboard');
})->name('user.dashboard');