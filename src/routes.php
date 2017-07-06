<?php
/**
 * Created by PhpStorm.
 * User: babaeian
 * Date: 6/12/17
 * Time: 2:43 PM
 */
Route::group(['middleware' => 'auth'], function () {

    Route::post('/logs', 'Amirhb\LaravelMongodbLog\LogController@index');
});