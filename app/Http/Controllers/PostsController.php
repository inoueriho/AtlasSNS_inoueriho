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
        $list = Post::orderBy('created_at','desc')->get();
        $list = Post::get();
        return view('posts.index',['list'=>$list]);
    }
    public function postCreate(Request $request){
        $validated = $request->validate([
                'post' => 'required|min:1|max:150'
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
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
    public function edit($id){
        Post::where('id',$id)->edit();
        return redirect('/top');
    }
    public function update(Request $request){
                $id =$request->input('id');
                $post = $request->input('post');
                dd($id , $post);

                User::where('id' , $id)->update([
                    'post' => $post,
                ]);
                return redirect('/top');
    }
}
