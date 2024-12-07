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
        $users = Auth::user();
        $list = Post::orderBy('created_at','asc')->first();
        $list = Post::get();

        $following_id = Auth::user()->follow()->pluck('followed_id');
        $followings = User::whereIn('id' , $following_id)->get();
        $list = Post::with('user')->where('user_id', Auth::id())->orWhereIn('user_id', $following_id)->orderBy('created_at','desc')->get();

        // dd($following_id);

        return view('posts.index',['list'=>$list],['users'=>$users]);
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
        // dd($request);
        $validated = $request->validate([
                'upPost' => 'string|max:150'
        ]);
                $id =$request->input('id');
                $post = $request->input('upPost');
                // dd($id,$post);
                Post::where('id' , $id)->update([
                    'post' => $post,
                ]);

                return redirect('/top');
    }
}
