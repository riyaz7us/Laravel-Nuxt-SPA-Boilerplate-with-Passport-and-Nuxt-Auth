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

Route::get('signature/{meeting_number}','ZoomController@generate_signature');
Route::get('programs','ProgramController@index');
Route::get('programs/{id}', 'ProgramController@show');
Route::get('programs/{id}/live-session', 'ProgramController@getLiveSession');
Route::get('programs/{id}/industrial-visit', 'ProgramController@getIndustrialVisit');
Route::post('programs','ProgramController@store');
Route::post('programs/live_session','ProgramController@createLiveSession');
Route::put('programs/{program}','programcontroller@update');
Route::get('icp','IcpController@show');
Route::post('icp','IcpController@update');
Route::post('images','ImageController@addImage');
Route::post('images/delete','ImageController@deleteImage');
Route::post('images/replace', 'ImageController@replaceImage');
Route::get('videos', 'ZoomController@streamVideo');
Route::post('videos', 'ZoomController@uploadVideo');
Route::get('testimonials', 'IcpController@showTestimonials');