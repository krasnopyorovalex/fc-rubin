<?php

Route::group(['prefix' => 'games', 'as' => 'games.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'GameController@index')->name('index');
    Route::get('create', 'GameController@create')->name('create');
    Route::post('', 'GameController@store')->name('store');
    Route::get('{id}/edit', 'GameController@edit')->name('edit');
    Route::put('{id}', 'GameController@update')->name('update');
    Route::delete('{id}', 'GameController@destroy')->name('destroy');

});
