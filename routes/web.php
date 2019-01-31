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
//Route::resource('driver', 'DriverController');
Route::resource('admin/driver', 'DriverController')->except([
    'create'
])->middleware('basicAuth');

Route::get('register/{locale?}', function ($locale =null) {
    App::setLocale($locale);
    return view('register.register');
})->name('register');

Route::get('/', function () {
    return redirect()->route('register',['locale'=>'en']);
});
