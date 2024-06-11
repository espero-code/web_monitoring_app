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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/module/{slug}', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/api/module', 'App\Http\Controllers\HomeController@get_module_datas')->name('home.get_module_datas');
Route::get('/api/module/{slug}', 'App\Http\Controllers\HomeController@get_module_datas')->name('home.get_module_datas');



Route::prefix('admin')->name('admin.')->group(function(){

    //Get Categories datas
    Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');

    //Show Category by Id
    Route::get('/categories/show/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

    //Get Categories by Id
    Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');

    //Edit Category by Id
    Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');

    //Save new Category
    Route::post('/categories/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');

    //Update One Category
    Route::put('/categories/update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update');

    //Update One Category Speedly
    Route::put('/categories/speed/{category}', 'App\Http\Controllers\CategoryController@updateSpeed')->name('category.update.speed');

    //Delete Category
    Route::delete('/categories/delete/{category}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Data datas
    Route::get('/data', 'App\Http\Controllers\DataController@index')->name('data.index');

    //Show Data by Id
    Route::get('/data/show/{id}', 'App\Http\Controllers\DataController@show')->name('data.show');

    //Get Data by Id
    Route::get('/data/create', 'App\Http\Controllers\DataController@create')->name('data.create');

    //Edit Data by Id
    Route::get('/data/edit/{id}', 'App\Http\Controllers\DataController@edit')->name('data.edit');

    //Save new Data
    Route::post('/data/store', 'App\Http\Controllers\DataController@store')->name('data.store');

    //Update One Data
    Route::put('/data/update/{data}', 'App\Http\Controllers\DataController@update')->name('data.update');

    //Update One Data Speedly
    Route::put('/data/speed/{data}', 'App\Http\Controllers\DataController@updateSpeed')->name('data.update.speed');

    //Delete Data
    Route::delete('/data/delete/{data}', 'App\Http\Controllers\DataController@delete')->name('data.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Modules datas
    Route::get('/modules', 'App\Http\Controllers\ModuleController@index')->name('module.index');

    //Show Module by Id
    Route::get('/modules/show/{id}', 'App\Http\Controllers\ModuleController@show')->name('module.show');

    //Get Modules by Id
    Route::get('/modules/create', 'App\Http\Controllers\ModuleController@create')->name('module.create');

    //Edit Module by Id
    Route::get('/modules/edit/{id}', 'App\Http\Controllers\ModuleController@edit')->name('module.edit');

    //Save new Module
    Route::post('/modules/store', 'App\Http\Controllers\ModuleController@store')->name('module.store');

    //Update One Module
    Route::put('/modules/update/{module}', 'App\Http\Controllers\ModuleController@update')->name('module.update');

    //Update One Module Speedly
    Route::put('/modules/speed/{module}', 'App\Http\Controllers\ModuleController@updateSpeed')->name('module.update.speed');

    //Delete Module
    Route::delete('/modules/delete/{module}', 'App\Http\Controllers\ModuleController@delete')->name('module.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Types datas
    Route::get('/types', 'App\Http\Controllers\TypeController@index')->name('type.index');

    //Show Type by Id
    Route::get('/types/show/{id}', 'App\Http\Controllers\TypeController@show')->name('type.show');

    //Get Types by Id
    Route::get('/types/create', 'App\Http\Controllers\TypeController@create')->name('type.create');

    //Edit Type by Id
    Route::get('/types/edit/{id}', 'App\Http\Controllers\TypeController@edit')->name('type.edit');

    //Save new Type
    Route::post('/types/store', 'App\Http\Controllers\TypeController@store')->name('type.store');

    //Update One Type
    Route::put('/types/update/{type}', 'App\Http\Controllers\TypeController@update')->name('type.update');

    //Update One Type Speedly
    Route::put('/types/speed/{type}', 'App\Http\Controllers\TypeController@updateSpeed')->name('type.update.speed');

    //Delete Type
    Route::delete('/types/delete/{type}', 'App\Http\Controllers\TypeController@delete')->name('type.delete');

});
Route::prefix('admin')->name('admin.')->group(function(){

    //Get Users datas
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');

    //Show User by Id
    Route::get('/users/show/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');

    //Get Users by Id
    Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('user.create');

    //Edit User by Id
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');

    //Save new User
    Route::post('/users/store', 'App\Http\Controllers\UserController@store')->name('user.store');

    //Update One User
    Route::put('/users/update/{user}', 'App\Http\Controllers\UserController@update')->name('user.update');

    //Update One User Speedly
    Route::put('/users/speed/{user}', 'App\Http\Controllers\UserController@updateSpeed')->name('user.update.speed');

    //Delete User
    Route::delete('/users/delete/{user}', 'App\Http\Controllers\UserController@delete')->name('user.delete');

});
