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

Auth::routes();
Route::get('/home', 'ProfileController@index')->name('home');

Route::get('/', function () {
	return redirect() -> route('login');
});

Route::resource('users', 'UserController');
Route::get('users/{id}/changeStatus', 'UserController@changeStatus') -> name('users.status');
Route::delete('delete-multiple-users', 'UserController@deleteMultiple') -> name('users.delete-multiple');
Route::resource('profile', 'ProfileController') -> only(['index', 'edit', 'update']);
Route::resource('reports', 'ReportController');
Route::get('all-reports', 'AllReportsController@all') -> name('reports.all');
Route::get('print-birth/{id}', 'PrintController@printBirth') -> name('print.birth');
Route::get('print-id/{id}', 'PrintController@printId') -> name('print.id');

Route::get('settings/accounts', 'AccountsController@getAccountSettings') -> name('account.index');
Route::put('settings/accounts/{id}', 'AccountsController@updateAccountSettings') -> name('account.update');

Route::post('search','SearchController@search') -> name('search');

