<?php

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

// Route::get('/', function () {
//     return view('welcom');
// });

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard-mgt.dashboard');
    });
    Route::get('inventroy', function () {
        return view('admin.inventory-mgt.inventory');
    });

    Route::get('transactions', function () {
        return view('admin.transaction-mgt.transactions');
    });


    // users Routes
    Route::resource('users', 'Admin\UserController');
    // end users routes


    Route::get('account-setting', function () {
        return view('admin.account-setting-mgt.account-setting');
    });

    // categories Routes
    Route::resource('categories', 'Admin\CategoryController');

    // locations Routes
    Route::resource('locations', 'Admin\LocationController');
    // end of location route


    // Account number Routes
    Route::resource('account-number', 'Admin\AccountNumberController');
    // End Account number Routes


    // Account number Routes
    Route::resource('project-number', 'Admin\ProjectNumberController');
    // End Account number Routes


    // Account number Routes
    Route::resource('justifications', 'Admin\JustificationController');
    // End Account number Routes



});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'FrontendController@cart');
Route::get('/', 'FrontendController@index');