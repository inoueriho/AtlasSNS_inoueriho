<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    //
    protected $fillable=[
        'post','user_id'
    ];
    // リレーションの設定。投稿は一つの投稿者に従属する。
     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getUserNameById(){
        return DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->get();
    }
}
