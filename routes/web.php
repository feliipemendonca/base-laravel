<?php

use App\Http\Controllers\dashboard\BlogsController;
use App\Http\Controllers\dashboard\ContactsController;
use App\Http\Controllers\dashboard\PagesController;
use App\Http\Controllers\dashboard\ProductsConttoller;
use App\Http\Controllers\dashboard\SettingsConttoller;
use App\Http\Controllers\dashboard\SlidesController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard' ,'as' => 'dashboard.','middleware' => 'auth'], function () {
	
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\dashboard\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\dashboard\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\dashboard\ProfileController@password']);

	Route::resources([
		'slides'	=> SlidesController::class,
		'blog' 		=> BlogsController::class,
		'pages' 	=> PagesController::class,
		'settings' 	=> SettingsConttoller::class,
		'products' 	=> ProductsConttoller::class,
		'contacts' 	=> ContactsController::class,
		'users' 	=> UsersController::class
	]);

});

