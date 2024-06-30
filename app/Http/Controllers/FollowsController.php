<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow; //Followモデルをインポート
use Illuminate\Support\Facades\Auth; // Authファサードを読み込む

class FollowsController extends Controller
{
    // public function check_following($id){

    //     //自分がフォローしているかどうか検索
    //     $check = Follow::where('following', Auth::id() )->where('followed', $id);

    //     if($check->count() == 0):
    //         //フォローしている場合
    //         return response()->json(['status' => false]);
    //     elseif($check->count() != 0):
    //         //まだフォローしていない場合
    //         return response()->json(['status' => true]);
    //     endif;
    // }

            public function follow($userId){
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていなかったら下記のフォロー処理を実行
        if (!$is_following) {

            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;

            // フォローデータをデータベースに登録
            Follow::create([
                'following_id' => $follower->id,
                'followed_id' => $followedUserId,
            ]);
            return redirect()->back(); // フォロー後に元のページにリダイレクト
        }
        }
        public function unfollow($userId){
            // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォローしていれば下記のフォロー解除を実行する
        if ($is_following) {

            $loggedInUserId = auth()->user();

            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;

            Follow::where([
                ['followed_id', '=', $followedUserId],
                ['following_id', '=', $loggedInUserId->id],
            ])
                ->delete();
        }
        return redirect()->back();
        // return redirect('/web.phpに戻って処理');
            }
    //
    // public function followList(){
    //     $following_id = Auth::user()->follow()->pluck('followed_id');
    //     $followings = User::whereIn('user_id' , $following_id)->get();
    //     return view('follows.followList' , compact('followings'));
    // }
    public function followList_view(){
        $list = Post::orderBy('created_at','desc')->get();
        $list = Post::get();
        // dd($list);

        $following_id = Auth::user()->follow()->pluck('followed_id');
        $followings = User::whereIn('id' , $following_id)->get();
        $posts = Post::with('user')->whereIn('id', $following_id)->get();
        return view('follows.followList' , compact('posts','followings','list'));
    }
    public function followerList_view(){
        $list = Post::orderBy('created_at','desc')->get();
        $list = Post::get();

        $followed_id = Auth::user()->followUsers()->pluck('following_id');
        // dd($followed_id);
        $followers = User::whereIn('id' , $followed_id)->get();
        $posts = Post::with('user')->whereIn('id', $followed_id)->get();
        return view('follows.followerList' , compact('posts','followers','list'));
        // return view('フォルダ名.blade名');
    }
}
