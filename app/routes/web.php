<?php
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('package','PackageController@index')->name('package');
    Route::post('package','PackageController@send');
});

/*Route::group(['namespace'=>'Caravan\Package\Http\Controllers\Web'],function (){
        Route::get('package','PackageController@index')->name('package');
        Route::post('package','PackageController@send');
    });
*/




