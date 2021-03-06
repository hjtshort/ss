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
    Route::get('/', 'AdminController@index')->name('index');
    //Customer
    Route::middleware(['checkRoles:0'])->group(function(){
        Route::get('employees','AdminController@employee')->name('employee');
        Route::post('createEmployee','AdminController@createEmployee')->name('createEmployee');
        Route::post('getEmployee','AdminController@getEmployee')->name('getEmployee');
        Route::post('editEmployee','AdminController@editEmployee')->name('editEmployee');
        Route::post('deleteEmployee','AdminController@deleteEmployee')->name('deleteEmployee');
        Route::post('add-manage','AdminController@addManage')->name('addmanage');
        Route::get('collaborators','AdminController@collaborators')->name('collaborators');
        Route::get('customers-of-collaborators/{id}','AdminController@showCustomerOfCollaborators')->name('getCustomersByCollaborators');
        Route::get('customers-of-employee/{id}','AdminController@showCustomersOfEmployees')->name('getCustomersByEmployees');
    });
    Route::get('customers','AdminController@customer')->name('customer');
    Route::post('insertCustomers','AdminController@createCustomer')->name('insertCustomer');
    Route::post('getCustomers','AdminController@getCustomer')->name('getCustomer');
    Route::post('editCustomers','AdminController@editCustomer')->name('editCustomer');
    Route::post('deleteCustomers','AdminController@deleteCustomer')->name('deleteCustomer');
//    Route::post('deleteMultipleCustomers','AdminController@deleteMultipleCustomer')->name('deleteMultipleCustomer');
    Route::post('chooseManagerForCustomer','AdminController@chooseManagerForCustomer')->name('choose');
    //


    //danh sách khách hàng nhan vien quan ly va send mail
    Route::middleware(['checkRoles:1'])->group(function(){
        Route::get('list-customers','AdminController@listCustomer')->name('listCustomer');
    });

    Route::post('sendmail','AdminController@sendMail')->name('sendMail');
    //
});
Route::post('login','AdminController@login')->name('postLogin');
Route::get('logout','AdminController@logout')->name('logout');
Route::get('register',function(){
    return view('modules.register');
})->name('register');
Route::post('register','AdminController@register')->name('postRegister');
Route::get('404',function(){
    return view('404');
})->name('404');