<?php

Route::group(['prefix' => 'teams', 'as' => 'teams.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'TeamController@index')->name('index');
    Route::get('create', 'TeamController@create')->name('create');
    Route::post('', 'TeamController@store')->name('store');
    Route::get('{id}/edit', 'TeamController@edit')->name('edit');
    Route::put('{id}', 'TeamController@update')->name('update');
    Route::delete('{id}', 'TeamController@destroy')->name('destroy');

});