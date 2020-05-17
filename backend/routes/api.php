<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'User\AuthController@login')->name('auth.login');
    Route::post('logout', 'User\AuthController@logout')->name('auth.logout');
    Route::post('refresh', 'User\AuthController@refresh')->name('auth.refresh');

});

//Account
Route::group([

    'middleware' => 'api',
    'prefix' => 'account'

], function ($router) {

    Route::post('register', 'User\RegisterController@register')->name('account.register');
    Route::post('validate', 'User\RegisterController@validate')->name('account.validate');

});

//Dynamic
Route::group([

    'middleware' => 'api'/*,
    'prefix' => 'trelingo'*/

], function ($router) {

    Route::resource('preferences', 'Dynamic\PreferencesController')->except(['index','create','store','edit','destroy']);
    Route::resource('vl', 'Dynamic\ValueListsController')->except(['show','create','edit']);
    Route::resource('customers', 'Dynamic\CustomersController')->except(['create','edit']);
    Route::resource('contacts', 'Dynamic\ContactsController')->except(['create','edit']);
    Route::resource('products', 'Dynamic\ProductsController')->except(['create','edit']);
    Route::resource('quotes', 'Dynamic\QuotesController')->except(['create','edit']);
    Route::resource('orders', 'Dynamic\OrdersController')->except(['create','edit']);
    Route::resource('invoices', 'Dynamic\InvoicesController')->except(['create','store','edit']);

});
