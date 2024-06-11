<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/module/{slug}', 'App\Http\Controllers\HomeController@index')->name('module_by_slug');
Route::get('/api/module', 'App\Http\Controllers\HomeController@get_module_datas')->name('home.get_module_datas');
Route::get('/api/module/{slug}', 'App\Http\Controllers\HomeController@get_module_datas')->name('home.get_module_datas');





Route::prefix('admin')->name('admin.')->group(function(){

    //Get Modules datas
    Route::get('/modules', 'App\Http\Controllers\ModuleController@index')->name('modules.index');

    //Show Module by Id
    Route::get('/modules/show/{id}', 'App\Http\Controllers\ModuleController@show')->name('modules.show');

    //Get Modules by Id
    Route::get('/modules/create', 'App\Http\Controllers\ModuleController@create')->name('modules.create');

    //Edit Module by Id
    Route::get('/modules/edit/{id}', 'App\Http\Controllers\ModuleController@edit')->name('modules.edit');

    //Save new Module
    Route::post('/modules/store', 'App\Http\Controllers\ModuleController@store')->name('modules.store');

    //Update One Module
    Route::put('/modules/update/{module}', 'App\Http\Controllers\ModuleController@update')->name('modules.update');

    //Update One Module Speedly
    Route::put('/modules/speed/{module}', 'App\Http\Controllers\ModuleController@updateSpeed')->name('modules.update.speed');

    //Delete Module
    Route::delete('/modules/delete/{module}', 'App\Http\Controllers\ModuleController@delete')->name('modules.delete');

});

Route::prefix('admin')->name('admin.')->group(function(){

    //Get Measured_types datas
    Route::get('/measured_types', 'App\Http\Controllers\MeasuredTypeController@index')->name('measured_types.index');

    //Show Measured_type by Id
    Route::get('/measured_types/show/{id}', 'App\Http\Controllers\MeasuredTypeController@show')->name('measured_types.show');

    //Get Measured_types by Id
    Route::get('/measured_types/create', 'App\Http\Controllers\MeasuredTypeController@create')->name('measured_types.create');

    //Edit Measured_type by Id
    Route::get('/measured_types/edit/{id}', 'App\Http\Controllers\MeasuredTypeController@edit')->name('measured_types.edit');

    //Save new Measured_type
    Route::post('/measured_types/store', 'App\Http\Controllers\MeasuredTypeController@store')->name('measured_types.store');

    //Update One Measured_type
    Route::put('/measured_types/update/{measured_types}', 'App\Http\Controllers\MeasuredTypeController@update')->name('measured_types.update');

    //Update One Measured_type Speedly
    Route::put('/measured_types/speed/{measured_types}', 'App\Http\Controllers\MeasuredTypeController@updateSpeed')->name('measured_types.update.speed');

    //Delete Measured_type
    Route::delete('/measured_types/delete/{measured_types}', 'App\Http\Controllers\MeasuredTypeController@delete')->name('measured_types.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get DataCollecteds datas
    Route::get('/data_collecteds', 'App\Http\Controllers\DataCollectedController@index')->name('data_collecteds.index');

    //Show DataCollected by Id
    Route::get('/data_collecteds/show/{id}', 'App\Http\Controllers\DataCollectedController@show')->name('data_collecteds.show');

    //Get DataCollecteds by Id
    Route::get('/data_collecteds/create', 'App\Http\Controllers\DataCollectedController@create')->name('data_collecteds.create');

    //Edit DataCollected by Id
    Route::get('/data_collecteds/edit/{id}', 'App\Http\Controllers\DataCollectedController@edit')->name('data_collecteds.edit');

    //Save new DataCollected
    Route::post('/data_collecteds/store', 'App\Http\Controllers\DataCollectedController@store')->name('data_collecteds.store');

    //Update One DataCollected
    Route::put('/data_collecteds/update/{data_collecteds}', 'App\Http\Controllers\DataCollectedController@update')->name('data_collecteds.update');

    //Update One DataCollected Speedly
    Route::put('/data_collecteds/speed/{data_collecteds}', 'App\Http\Controllers\DataCollectedController@updateSpeed')->name('data_collecteds.update.speed');

    //Delete DataCollected
    Route::delete('/data_collecteds/delete/{data_collecteds}', 'App\Http\Controllers\DataCollectedController@delete')->name('data_collecteds.delete');

});
