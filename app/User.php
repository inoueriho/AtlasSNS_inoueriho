<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','following_id','followed_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // リレーションの設定。投稿者は複数の投稿を持つ。
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    //ログインユーザーのフォロワー //リレーションしただけ。
   public function followUsers(){
    return $this->belongsToMany('App\User','follows','followed_id','following_id'); //テーブル名・カラム名記載
   }
   //ログインユーザーがフォローしているユーザー //リレーションしただけ
   public function follow(){
    return $this->belongsToMany('App\User','follows','following_id','followed_id');
   }
   //フォロー機能
   public function following($user_id){
    return $this ->followUsers()->attach($user_id);
   }
   //フォロー解除
   public function followed(){
    return $this->follows->detach($user_id);
   }
   //フォローしているかの判定(follow()は上のリレーションを指してる。)
   public function isFollowing($user_id){
    return (bool) $this->follow()->where('followed_id', $user_id)->first();
   }
   //フォローされているかの判定(followUsers()は上のリレーションを指してる。)
   public function isFollowed($user_id){
    return(bool) $this->followUsers()->where('following_id',$user_id)->first();
   }
}
