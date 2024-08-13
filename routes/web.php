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

//アクセス制限
Route::group(['middleware'=>'auth'],function(){
//ログイン中のページ
Route::get('/top','PostsController@index');
//投稿の登録処理
Route::post('/top/post','PostsController@postCreate');
// Route::post('/top/post','PostsController@postUpdate');

//投稿編集処理・編集ボタンが押されてモーダルが開く
Route::get('/top/{id}/edit','PostsController@edit');
Route::post('/post/update','PostsController@update');

//投稿の削除処理
Route::get('/top/{id}/delete', 'PostsController@delete');

//プロフィールの編集画面表示
Route::get('/profile','UsersController@profile');
//プロフィール更新
Route::post('/profile/update-form', 'UsersController@update');

//検索画面の表示
Route::get('/search','UsersController@search');
//検索結果表示
Route::get('/search/result','UsersController@searchResult');

//フォローする
Route::get('/search/{userId}/follow','FollowsController@follow');
//フォロー解除する
Route::get('/search/{userId}/unfollow','FollowsController@unfollow');

//フォローリスト
Route::get('/follow-list','FollowsController@followList_view');

//フォロワーリスト
Route::get('/follower-list','FollowsController@followerList_view');

//相手ユーザーのプロフィールページ表示
Route::get('/user-profile/{id}','UsersController@userProfile');

//ログアウト機能
Route::get('/logout','Auth\LoginController@logout');
});
