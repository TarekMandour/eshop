<?php
/**
 * Route front
 */
if(sc_config('Telr')) {
Route::group(
    [
        'prefix'    => 'plugin/telr',
        'namespace' => 'App\Plugins\Payment\Telr\Controllers',
    ],
    function () {
        Route::get('index', 'FrontController@index')
        ->name('telr.index');
        Route::get('process-order', 'FrontController@processOrder')
        ->name('telr.processOrder');
        Route::get('return/{orderId}', 'FrontController@getReturn')
        ->name('telr.return');
    }
);
}
/**
 * Route admin
 */
Route::group(
    [
        'prefix' => SC_ADMIN_PREFIX.'/telr',
        'middleware' => SC_ADMIN_MIDDLEWARE,
        'namespace' => 'App\Plugins\Payment\Telr\Admin',
    ], 
    function () {
        Route::get('/', 'AdminController@index')
        ->name('admin_telr.index');
    }
);
