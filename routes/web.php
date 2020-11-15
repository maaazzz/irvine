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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard-mgt.dashboard');
    })->name('admin.index');

    // transaction
    Route::resource('transactions', 'Admin\TransactionController');
    Route::get('transaction-destroy/{order}', 'Admin\TransactionController@destroy')->name('transaction.destroy');
    // end of transactions


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
    // End Account numb er Routes


    // Account number Routes
    Route::resource('justifications', 'Admin\JustificationController');
    // End Account number Routes


    // approval routes
    Route::get('approvals', 'Admin\ApprovalController@index')->name('approvals');
    Route::put('approvals/approved/{id}', 'Admin\ApprovalController@approved')->name('approval.approved');
    // end of approval routes


});

Auth::routes();


Route::get('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
Route::get('/cart/increase/{id}', 'CartController@inc')->name('cart.inc');
Route::get('/cart/decrease/{id}', 'CartController@dec')->name('cart.dec');

Route::get('get-categories-products/{id}', 'FrontendController@get_categories_products')->name('get-categories-products');
Route::get('get-location-products/{id}', 'FrontendController@get_location_products')->name('get-location-products');
Route::get('/home', 'HomeController@index')->name('home');
// front end routes
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'FrontendController@index');
    Route::get('/cart', 'FrontendController@cart');
    Route::get('/product/{id}', 'FrontendController@product')->name('single.product');
    Route::get('/order-history', 'FrontendController@orders');

    Route::get('/product/{id}/fev', 'FrontendController@addToFev');

    Route::get('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
    Route::get('/cart/increase/{id}', 'CartController@inc')->name('cart.inc');
    Route::get('/cart/decrease/{id}', 'CartController@dec')->name('cart.dec');


    // locations Routes
    Route::resource('order', 'Admin\OrderController');
    // end of location route

    // favorite
    Route::post('favourite', 'CartController@fvrt')->name('favourite');
    // end of favorite
    Route::get('/order/{id}/notes', 'Admin\OrderController@getNotes');
    // end of location route
});