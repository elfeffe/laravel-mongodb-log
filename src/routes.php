<?php
/**
 * Created by PhpStorm.
 * User: Amir Hossein Babaeian
 * Date: 6/12/17
 * Time: 2:43 PM
 */

Route::group(['middleware' => 'web'], function () {
    Route::get('/admin/log-manager', 'Amirhb\LaravelMongodbLog\LogController@index')->middleware('log-user')->name('log-manager');
});