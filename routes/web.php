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
    Route::get('users', function () {
        return view('admin.users-mgt.users');
    });
    Route::get('account-setting', function () {
        return view('admin.account-setting-mgt.account-setting');
    });

    // categories Routes
    Route::resource('categories', 'Admin\CategoryController');


    Route::get('locations', function () {
        return view('admin.location-mgt.locations');
    });

    Route::get('account-number', function () {
        return view('admin.account-number-mgt.account-numbers');
    });

    Route::get('project-number', function () {
        return view('admin.project-number-mgt.project-number');
    });
    Route::get('justifications', function () {
        return view('admin.categories-mgt.categories');
    });

    Route::get('justifications', function () {
        return view('admin.justification-mgt.justifications');
    });
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'FrontendController@cart');
Route::get('/', 'FrontendController@index');

