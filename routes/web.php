<?php

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
    return view('welcome');
});


Auth::routes(['register' => false]);



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Auth::routes();
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/register', [\App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('register');

});

Route::middleware(['auth:admin'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', 'HomeController@dashboard')->name('home');
    Route::get('/settings', 'SettingsController@index')->name('settings');

});


Route::middleware(['auth:web'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/search', 'HomeController@search')->name('home.search');
    Route::resource('/sets', 'SetController');
    Route::resource('/courses', 'CourseController');
    Route::post('/cards/{card}/image/upload', 'CardController@imageUpload')->name('cards.image.upload');
    Route::resource('/cards', 'CardController');

});
