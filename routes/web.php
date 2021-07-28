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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/unauthorized', function () {
    return view('/itdev-task/notification/401');
})->name('unauthorized');

// Route::get('/test', function () {
//     getOverdues();
// });

Auth::routes();

Route::resource('task', 'TaskController');
Route::resource('type', 'TypeController');
Route::resource('status', 'StatController');


Route::group(['prefix' => 'itdev-task'], function(){
    Route::get('dashboard', 'DashboardController@index')->name('itdev-task.dashboard');
    Route::get('task/show', 'TaskController@index')->name('itdev-task.tasklist');
    Route::get('type/show', 'TypeController@index')->name('itdev-task.typelist');
    Route::get('status/show', 'StatController@index')->name('itdev-task.statlist');
    Route::get('overdue', 'OverdueController@index')->name('itdev-task.overdue');
});

// Route::get('/itdev-task/dashboard', 'DashboardController@index')->name('itdev-task.dashboard');
// Route::get('/itdev-task/task/show', 'TaskController@index')->name('itdev-task.tasklist');
// Route::get('/itdev-task/type/show', 'TypeController@index')->name('itdev-task.typelist');
// Route::get('/itdev-task/status/show', 'StatController@index')->name('itdev-task.statlist');
// Route::get('/itdev-task/overdue', 'OverdueController@index')->name('itdev-task.overdue');

Route::get('home', 'DashboardController@index')->name('itdev-task.dashboard');
Route::get('profile', 'ProfileController@index')->name('profile.changepassword');
Route::put('profile/{id}', 'ProfileController@update')->name('profile.update');
