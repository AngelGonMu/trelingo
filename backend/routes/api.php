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
    Route::post('refresh', 'User\AuthController@refresh')->name('auth.refresh');
    Route::post('logout', 'User\AuthController@logout')->name('auth.logout');

});

//Account
Route::group([

    'middleware' => 'api',
    'prefix' => 'account'

], function ($router) {

    Route::post('register', 'User\RegisterController@register')->name('account.register');
    //Route::post('validate', 'User\RegisterController@validate')->name('account.validate');

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
    Route::resource('todos', 'Dynamic\TodosController')->except(['index','show','create','edit']);
    Route::resource('products', 'Dynamic\ProductsController')->except(['create','edit']);
    Route::resource('characteristics', 'Dynamic\CharacteristicsController')->except(['index','show','create','edit']);
    Route::resource('stock', 'Dynamic\StockController')->except(['index','show','create','edit']);
    Route::resource('quotes', 'Dynamic\QuotesController')->except(['create','edit']);
    Route::resource('orders', 'Dynamic\OrdersController')->except(['create','edit']);
    Route::resource('invoices', 'Dynamic\InvoicesController')->except(['create','store','edit']);
    Route::resource('lines', 'Dynamic\LinesController')->except(['index','show','create','edit']);
    Route::resource('payments', 'Dynamic\PaymentsController')->except(['index','show','create','edit']);
    Route::match(['put', 'patch'], 'users/{user}', 'User\AuthController@update');
    Route::get('dashboard', 'Dynamic\DashboardController@dashboard');
    Route::get('pdf/quotes/{quote}', 'Dynamic\QuotesController@savePDF');
    Route::get('pdf/invoices/{invoice}', 'Dynamic\InvoicesController@savePDF');

});
