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

Route::get('/', function () { return view('welcome'); })->name('root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('new_ticket', 'TicketsController@create')->name('create_ticket');

Route::post('new_ticket', 'TicketsController@store')->name('store_ticket');

Route::get('tickets', 'TicketsController@userTickets')->name('user_tickets');

Route::get('tickets/{ticket_id}', 'TicketsController@selectedTicket')->name('selected_ticket');

Route::post('comment', 'CommentsController@postComment')->name('user_comment');