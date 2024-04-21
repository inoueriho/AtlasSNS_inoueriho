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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');
//投稿の登録処理
Route::post('/top/post','PostsController@postCreate');
// Route::post('/top/post','PostsController@postUpdate');

//投稿の削除処理
Route::get('/top/{id}/delete', 'PostsController@delete');

//プロフィールの編集画面表示
Route::get('/profile','UsersController@profile');
//プロフィール更新
Route::post('/profile/update-form', 'UsersController@update');

//検索画面の表示
Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//ログアウト機能
Route::get('/logout','Auth\LoginController@logout');
