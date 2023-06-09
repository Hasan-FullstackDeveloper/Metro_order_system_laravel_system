<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Order_boray_nimco_Controller;
use App\Http\Controllers\User_Order_boray_nimco_Controller;
use App\Http\Controllers\User_Production_boray_nimco_Controller;


use App\Http\Controllers\Snack_and_nimco_Controller;





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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, // Registration Routes...
    // 'logout' => false,

  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

 
Route::resource('shopkeeper', ShopkeeperController::class)->name('shopkeeper' ,'');


Route::post('/user/filter', 'App\Http\Controllers\UserController@AssignRole')->name('AssignRole');

Route::resource('user', UserController::class)->name('user' ,'');


Route::post('/boray_nimco/update/{id}', 'App\Http\Controllers\Order_boray_nimco_Controller@update_order')->name('update_order');

Route::resource('boray_nimco', Order_boray_nimco_Controller::class)->name('boray_nimco' ,'');






Route::post('/boray_nimco/update/{id}', 'App\Http\Controllers\User_Order_boray_nimco_Controller@update_order')->name('update_order');

Route::resource('Order_boray_nimco', User_Order_boray_nimco_Controller::class)->name('Order_boray_nimco' ,'');



Route::post('/boray_nimco/update/{id}', 'App\Http\Controllers\User_Production_boray_nimco_Controller@update_order')->name('update_order');

Route::resource('production_boray_nimco', User_Production_boray_nimco_Controller::class)->name('production_boray_nimco' ,'');



Route::get('/snack_nimco/shop_name/{id}', 'App\Http\Controllers\Snack_and_nimco_Controller@GetShopName')->name('getcity');

Route::post('/snack_nimco/update/{id}', 'App\Http\Controllers\Snack_and_nimco_Controller@update_snack_order')->name('update_snack_order');

Route::resource('snack_and_nimco', Snack_and_nimco_Controller::class)->name('snack_and_nimco' ,'');

