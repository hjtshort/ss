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


Route::get('login',function(){
   return view('modules.login');
})->name('login');
Route::middleware(['CheckLogin'])->group(function () {
    Route::get('/', function () {
        return view('modules.index');
    })->name('index');
});
Route::post('login','AdminController@login')->name('postLogin');
Route::get('logout','AdminController@logout')->name('logout');
