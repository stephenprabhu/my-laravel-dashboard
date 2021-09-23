<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;

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
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/journal/all',[JournalController::class,'show'])->name('journal_entries');
    Route::get('/journal/entry/{slug}',[JournalController::class,'show_entry'])->name('journal-entry');
    Route::get('/journal/new', [JournalController::class,'show_create'])->name('journal-new-entry');
    Route::get('/journal/update/{slug}',[JournalController::class,'show_update'])->name('update-entry');

    Route::post('/create-entry',[JournalController::class,'create']);
    Route::post('/update-entry',[JournalController::class,'update']);
    Route::get('/delete-entry/{slug}',[JournalController::class,'destroy']);

    Route::get('/events-page',[EventController::class,'show_page'])->name('events-page');
    Route::post('/events/add',[EventController::class,'create']);
    Route::get('/events/all',[EventController::class,'show']);

});

//API CALLS
Route::get('/api/journal-entries',[JournalController::class,'show_entries']);
