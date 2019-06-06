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

//teams
Route::get("/", "TeamsController@index")->name("all-teams");
Route::get("/teams/{id}", "TeamsController@show")->name("single-team");

//players
Route::get("players/{id}", "PlayersController@show")->name("single-player");

//Reg
Route::get('/register',"RegisterController@create")->name("register");
Route::post("/register", "RegisterController@store");

//Login
Route::get("/login", "LoginController@create")->name("login");
Route::post("/login", "LoginController@store");

//Logout
Route::get("/logout", "LoginController@destroy");

//Comments
Route::post('/teams/{teamId}/comments', ['as' => 'comments-team', 'uses' => 'CommentsController@store'])->middleware("swear");

//Verify email
Auth::routes(['verify' => true]);

//News
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/create', 'NewsController@create')->name('create-news');
Route::post('/news/create', 'NewsController@store');
Route::get('/news/teams/{teamName}', 'NewsController@showTeam')->name('single-team-news');
Route::get('/news/{id}', 'NewsController@show')->name('single-news');

