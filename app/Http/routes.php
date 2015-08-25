<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/home/create', 'HomeSliderController@create');

Route::get('/admin/blank', function() {

    return view('admin.blank');

});

Route::post('/admin/home/store', 'HomeSliderController@store');