<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\EditUser;
use App\Http\Controllers\Front\EditPassword;
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
})->name('index');
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

Route::get('/admin-dashboard', [AdminController::class,'index'])->middleware('admin')->name('admin.dashboard');
Route::get('/admin-dashboard/users', [AdminController::class,'AllUsers'])->middleware('admin')->name('admin.allusers');
Route::get('/admin-dashboard/users/inactive/{id}', [AdminController::class,'InActive'])->middleware('admin')->name('admin.inactive');
Route::get('/admin-dashboard/users/active/{id}', [AdminController::class,'active'])->middleware('admin')->name('admin.active');
Route::get('/admin-dashboard/edit-user', [AdminController::class,'IndexEditUser'])->middleware('admin')->name('admin.editUser');
Route::post('/admin-dashboard/edit-user', [AdminController::class, 'EditUser']);
Route::get('/admin-dashboard/edit-password', [AdminController::class,'IndexEditPassword'])->middleware('admin')->name('admin.editPassword');
Route::post('/admin-dashboard/edit-password', [AdminController::class, 'EditPassword']);
Route::get('/admin-dashboard/gyms', [AdminController::class,'ShowGyms'])->middleware('admin')->name('admin.indexgyms');
Route::get('/admin-dashboard/gyms/create', [AdminController::class,'IndexAddGym'])->middleware('admin')->name('admin.indexaddgym');
Route::post('/admin-dashboard/gyms/create', [AdminController::class,'AddGym'])->middleware('admin')->name('admin.addgym');

Route::get('/admin-dashboard/gyms/edit/{id}', [AdminController::class,'IndexEditGym'])->middleware('admin')->name('admin.indexeditgym');
Route::put('/admin-dashboard/gyms/edit/update/{id}', [AdminController::class,'EditGym'])->name('admin.editgym');
Route::get('/admin-dashboard/gyms/delete/{id}', [AdminController::class,'IndexDestroyGym'])->middleware('admin')->name('admin.indexdestroygym');
Route::get('/admin-dashboard/gyms/image-delete/{id}', [AdminController::class,'ImageDelete'])->name('admin.imagedelete');

//Route::post('/admin-dashboard/gyms', [AdminController::class, 'EditPassword']);

Route::get('/user-dashboard', function () {
    
    return view('userdashboard');
})->middleware('UserActive')->name('user.dashboard');

Route::get('/user-dashboard/edit-password', [EditPassword::class,'index'])->name('editPassword');
Route::post('/user-dashboard/edit-password', [EditPassword::class, 'edit']);

Route::get('/user-dashboard/edit-user', [EditUser::class,'index'])->name('editUser');
Route::post('/user-dashboard/edit-user', [EditUser::class, 'edit']);