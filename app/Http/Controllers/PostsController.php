<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

use Auth;


class PostsController extends Controller
{
    //
    public function index(Post $post){
        $list = Post::orderBy('created_at','asc')->first();
        $list = Post::get();

        $following_id = Auth::user()->follow()->pluck('followed_id');
        $followings = User::whereIn('id' , $following_id)->get();
        $list = Post::with('user')->where('user_id', Auth::id())->orWhereIn('user_id', $following_id)->orderBy('created_at','desc')->get();

        // dd($following_id);

        return view('posts.index',['list'=>$list]);
    }
    public function postCreate(Request $request){
        $validated = $request->validate([
                'post' => 'string|max:150'
        ]);

        $user_id=Auth::user()->id;
        $post = $request->input('post');

        Post::create([
            'user_id'=>$user_id,
            'post' => $post,
            ]);
            return redirect('/top');
    }
    public function delete($id){
        // dd($id);
        $user_id = Auth::id();
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
    public function edit($id){
        $user_id = Auth::id();
        Post::where('id',$id)->edit();
        return redirect('/top');
    }
    public function update(Request $request){
                $id =$request->input('id');
                $post = $request->input('upPost');
                // dd($id,$post);
                Post::where('id' , $id)->update([
                    'post' => $post,
                ]);
                $validated = $request->validate([
                'post' => 'numeric|between:1,150'
        ]);
                return redirect('/top');
    }
}
