<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
        ->name('dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('sub-category', 'SubCategoryController');
        // Route::resource('data-record', 'DataRecordController');
        
    });
    Route::resource('data-record', 'DataRecordController');
// Route::prefix('staff')
//     ->namespace('Staff')
//     ->middleware(['auth','staff'])
//     ->group(function(){
//         Route::get('/', 'DashboardStaffController@index')
//         ->name('dashboard');
//         Route::resource('data-record', 'DataRecordController');
        
//     });


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
