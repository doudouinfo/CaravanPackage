<?php
/**
 * Router for Package
 */

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::apiResource('packages','PackageController')->except('show');
    Route::post('packages/store', 'PackageController@store');
    Route::get('packages/{PackagesId}', 'PackageController@show');
    Route::put('packages/{package}/update', 'PackageController@update');
    Route::delete('packages/{package}/destroy', 'PackageController@destroy');
});


