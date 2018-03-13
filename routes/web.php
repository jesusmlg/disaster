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


Route::middleware('auth')->group(function()
{
    Route::get('/', 'NoteController@index');
	Route::get('/home', 'NoteController@index')->name('home');
    Route::get('/notes','NoteController@index')->name('note_index');
    Route::get('/note/new','NoteController@new')->name('note_new');
    Route::get('/note/{id}/show','NoteController@show')->name('note_show');
    Route::get('/note/{id}/edit','NoteController@edit')->name('note_edit');
    Route::post('/note/create','NoteController@create')->name('note_create');
    Route::post('/note/{id}/update','NoteController@update')->name('note_update');
    Route::delete('note/{id}/destroy','NoteController@destroy')->name('note_destroy');

    Route::delete('/note/{note_id}/tag/{tag_id}/destroy','TagController@destroyNoteTag')->name('note_tag_destroy');

    Route::delete('/note/{note_id}/file/{file_id}/destroy','FileController@destroyNoteFile')->name('note_file_destroy');

    Route::post('tag/create','TagController@create')->name('tag_create');
    Route::post('/note/{id}/destroy','NoteController@destroy')->name('tag_destroy');
    Route::get('/tags','TagController@index')->name('tag_index');
    Route::get('/tag/list','TagController@list')->name('tag_list');

    Route::delete('/note/{note_id}/user/{user_id}/destroy','UserController@destroyNoteUser')->name('note_user_destroy');
    Route::get('/user/list','UserController@list')->name('user_list');
    Route::post('/note/user/create', 'UserController@create')->name('user_note_create');

});

