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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function()
{
    Route::get('/notes','NoteController@index')->name('note_index');
    Route::get('note/new','NoteController@new')->name('note_new');
    Route::get('note/{id}/show','NoteController@show')->name('note_show');
    Route::get('note/{id}/edit','NoteController@edit')->name('note_edit');
    Route::post('note/create','NoteController@create')->name('note_create');
    Route::post('note/{id}/delete','NoteController@delete')->name('note_delete');

});

