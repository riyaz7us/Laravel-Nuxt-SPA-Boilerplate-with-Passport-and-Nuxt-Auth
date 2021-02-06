<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::group(
    [
        'prefix' => 'auth'
    ],
    function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@register');
        Route::group([
            'middleware' => 'auth:api'
        ], function () {
            Route::post('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@details');
            //NO NEED OF MIDDLEWARE TO CHECK ROLE, JUST ADDED FOR DEMONSTRATION
            Route::get('role', 'AuthController@role')->middleware('checkAdmin');
        });
    }
);