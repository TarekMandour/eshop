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
//     return view('welcome');
// });


$router->get('sellmylaptop', 'ShopContentController@sell_form')->name('sellmylaptop');
$router->post('sellmylaptop', 'ShopContentController@sell_form_create')->name('sellmylaptop_form');

$router->get('recycle', 'ShopContentController@recycle_form')->name('recycle');
$router->post('recycle', 'ShopContentController@recycle_form_create')->name('recycle_form');