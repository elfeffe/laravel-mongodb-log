<?php
/**
 * Created by PhpStorm.
 * User: Amir Hossein Babaeian
 * Date: 6/12/17
 * Time: 2:43 PM
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('/log-manager', 'Amirhb\LaravelMongodbLog\LogController@index')->middleware('log-user')->name('log-manager');
    Route::get('/filter-logs', 'Amirhb\LaravelMongodbLog\LogController@filter')->middleware('log-user')->name('filter-logs');
});