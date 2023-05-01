<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommissaryController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ClientRequestsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/requests/client-get',[ClientRequestsController::class ,'getRequest'])->name('getRequest');
Route::get('/requests/client-donate', [ClientRequestsController::class,'donateRequest'])->name('donateRequest');
Route::resource('/requests/client', ClientRequestsController::class);

Route::group(['middleware' => 'CheckClient' ], function () {

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');


	Route::resource('/users', UserController::class);
	
	Route::resource('/clients', ClientController::class);
	Route::get('clients/remove/{id}', [ClientController::class,  'removeClient']);
	
	Route::resource('/admins', AdminController::class);
	Route::get('admins/remove/{id}', [AdminController::class,  'removeAdmin']);

	Route::resource('/testers', TesterController::class);
	Route::get('testers/remove/{id}', [TesterController::class,  'removeTester']);

	Route::resource('/commissaries', CommissaryController::class);
	Route::get('commissaries/remove/{id}', [CommissaryController::class,  'removeCommissary']);

	Route::resource('/hospitals', HospitalController::class);
	// Route::get('commissaries/remove/{id}', [CommissaryController::class,  'removeCommissary']);
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () { return view('dashboard');})->name('sign-up');

});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');