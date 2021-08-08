<?php

Route::group(['prefix' => 'game-images', 'as' => 'game_images.'], static function () {
    Route::pattern('id', '[0-9]+');
    Route::pattern('game', '[0-9]+');

    Route::get('{game}', 'GameImageController@index')->name('index');
    Route::post('{game}', 'GameImageController@store')->name('store');
    Route::get('{id}/edit', 'GameImageController@edit')->name('edit');
    Route::put('{id}', 'GameImageController@update')->name('update');
    Route::delete('{id}', 'GameImageController@destroy')->name('destroy');

    Route::post('update-positions', 'GameImageController@updatePositions')->name('update_positions');
});
