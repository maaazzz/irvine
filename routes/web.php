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

<<<<<<< HEAD

Route::group(['prefix' => 'admin'], function () {
=======
Route::group(['middleware' => ['auth', 'warehouse'], 'prefix' => 'admin'], function () {
>>>>>>> 59c77f3507c44a4184aba8b16674d96c16e24d5b

    Route::get('/', function () {
        return view('admin.dashboard-mgt.dashboard');
    });

    Route::get('transactions', function () {
        return view('admin.transaction-mgt.transactions');
    });


    // users Routes
    Route::resource('users', 'Admin\UserController');
    // end users routes


    // account setting
    Route::get('account-setting', function () {
        return view('admin.account-setting-mgt.account-setting');
    });
    Route::post('password-reset', 'Admin\UserController@passwordReset')->name('password-reset');
    // end of account setting

    // categories Routes
    Route::resource('categories', 'Admin\CategoryController');

    // Inventory Routes
    Route::resource('inventory', 'Admin\InventoryController');
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

Route::get('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
Route::get('/cart/increase/{id}', 'CartController@inc')->name('cart.inc');
Route::get('/cart/decrease/{id}', 'CartController@dec')->name('cart.dec');