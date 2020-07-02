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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function (){
    Route::resource('/listTodo', 'ListTodoController');
    Route::resource('/todo', 'TodoController')->except('create', 'store');

    Route::post('/todo/{listTodo}/create', 'TodoController@create')->name('todo.create');
    Route::post('/todo/{listTodo}', 'TodoController@store')->name('todo.store');

    Route::get('/todo/statusUpdate/{todo}/{status}', 'TodoController@updateStatus')->name('todo.updateStatus');
});
