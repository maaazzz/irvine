<?php

<<<<<<< HEAD
=======
use App\Model\Order;
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
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
<<<<<<< HEAD
    })->name('admin.index');

    // transaction
    Route::resource('transactions', 'Admin\TransactionController');
    Route::get('transaction-destroy/{order}', 'Admin\TransactionController@destroy')->name('transaction.destroy');
    // end of transactions


    // users Routes
    Route::resource('users', 'Admin\UserController');
=======
    })->name('admin.index')->middleware('admin');

    // transaction
    Route::resource('transactions', 'Admin\TransactionController')->middleware('admin');
    Route::get('transaction-destroy/{order}', 'Admin\TransactionController@destroy')->name('transaction.destroy')->middleware('admin');
    // end of transactions



    // users Routes
    Route::resource('users', 'Admin\UserController')->middleware('admin');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    // end users routes


    // account setting
    Route::get('account-setting', function () {
        return view('admin.account-setting-mgt.account-setting');
    });
    Route::post('password-reset', 'Admin\UserController@passwordReset')->name('password-reset');
    // end of account setting

    // categories Routes
<<<<<<< HEAD
    Route::resource('categories', 'Admin\CategoryController');

    // Inventory Routes
    Route::resource('inventory', 'Admin\InventoryController');
    // locations Routes
    Route::resource('locations', 'Admin\LocationController');
=======
    Route::resource('categories', 'Admin\CategoryController')->middleware('admin');

    // Inventory Routes
    Route::resource('inventory', 'Admin\InventoryController')->middleware('admin');
    // locations Routes
    Route::resource('locations', 'Admin\LocationController')->middleware('admin');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    // end of location route


    // Account number Routes
<<<<<<< HEAD
    Route::resource('account-number', 'Admin\AccountNumberController');
=======
    Route::resource('account-number', 'Admin\AccountNumberController')->middleware('admin');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    // End Account number Routes


    // Account number Routes
<<<<<<< HEAD
    Route::resource('project-number', 'Admin\ProjectNumberController');
=======
    Route::resource('project-number', 'Admin\ProjectNumberController')->middleware('admin');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    // End Account numb er Routes


    // Account number Routes
<<<<<<< HEAD
    Route::resource('justifications', 'Admin\JustificationController');
=======
    Route::resource('justifications', 'Admin\JustificationController')->middleware('admin');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    // End Account number Routes


    // approval routes
<<<<<<< HEAD
    Route::get('approvals', 'Admin\ApprovalController@index')->name('approvals');
    Route::put('approvals/approved/{id}', 'Admin\ApprovalController@approved')->name('approval.approved');
    // end of approval routes

=======
    Route::get('approvals', 'Admin\ApprovalController@index')->name('approvals')->middleware('approver');
    Route::put('approvals/approved/{id}', 'Admin\ApprovalController@approved')->name('approval.approved')->middleware('approver');
    // end of approval routes

    //all orders
    Route::get('all-orders', function () {
        $orders = Order::all();
        return view('admin.warehouse-order-mgt.order', compact('orders'));
    })->middleware('warehouse');
    //end all orders

>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5

});

Auth::routes();


<<<<<<< HEAD
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
    Route::get('/favorite', 'FrontendController@favorite');
    Route::get('/product/{id}/fev', 'FrontendController@addToFev');
    Route::get('/favorite/remove/{id}', 'FrontendController@remove')->name('fav.remove');
=======
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontendController@index')->middleware('auth');
// front end routes
Route::group(['middleware' => ['auth']], function () {
    // account setting
    Route::get('account-setting', function () {
        return view('front-end.account-setting');
    });
    Route::get('/cart', 'FrontendController@cart');
    Route::get('/product/{id}', 'FrontendController@product')->name('single.product');
    Route::get('/order-history', 'FrontendController@orders');

    Route::get('/product/{id}/fev', 'FrontendController@addToFev');

>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    Route::get('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');
    Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
    Route::get('/cart/increase/{id}', 'CartController@inc')->name('cart.inc');
    Route::get('/cart/decrease/{id}', 'CartController@dec')->name('cart.dec');


    // locations Routes
    Route::resource('order', 'Admin\OrderController');
    // end of location route

<<<<<<< HEAD

=======
    // favorite
    Route::post('favourite', 'CartController@fvrt')->name('favourite');
    // end of favorite
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
    Route::get('/order/{id}/notes', 'Admin\OrderController@getNotes');
    // end of location route
});