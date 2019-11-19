<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('newHotel', function () {
    return view('admin/hotel/newHotel');
})->name('newHotel');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/hotels', 'HotelController')->names([
        'create' => 'hotels.build',
        'edit' => 'hotels.edit',
        'update'=>'hotels.update'
    ]);
    
    Route::post('/changeStatus', 'Controller@changeStatus')->name('changeStatus');
});
