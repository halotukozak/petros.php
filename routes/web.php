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
})->name('welcome');

Route::middleware(['auth'])->group(function (){
    Route::get('/donates/{id}/delete', 'App\Http\Controllers\DonateController@delete')->name('donate.delete');
    Route::get('/donates/search', 'App\Http\Controllers\DonateController@search')->name('donate.search');
    Route::get('/donates/report', 'App\Http\Controllers\DonateController@report')->name('donates.report');
    Route::resource('donates', 'App\Http\Controllers\DonateController');
});


require __DIR__ . '/auth.php';
