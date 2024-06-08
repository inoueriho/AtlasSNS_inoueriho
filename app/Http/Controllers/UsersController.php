<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
{

    public function profile(Request $request) {
       $id = $request->input('id');
       $username = $request->input('username');
       $mail = $request->input('mail');
       $password = $request->input('password');
       $bio = $request->input('bio');

       return view('users.profile');
    }

        public function update(Request $request) {
            $validated = $request->validate([
                'username' => ' required | min:2 | max:12',
                'mail' => 'required |email | min:5 | max:40 | unique:users,mail,'.Auth::user()->mail.'mail',
                'password' => ' required | alpha_dash | min:8 | max:20',
                'bio' => ' max:150 ',
                'image' => 'image | mimes:jpg,png,bmp,gif,svg',
            ]);
                $id =$request->input('id');
                $username = $request->input('username');
                $mail = $request->input('mail');
                $password = $request->input('password');
                $bio = $request->input('bio');

                User::where('id' , $id)->update([
                    'username' => $username,
                    'mail' => $mail,
                    'password' => Hash::make($request->password),
                    'bio' => $bio,
                ]);
                return redirect('/top');
        }
        public function search(Request $request){
            $users = User::all();
            // dd($users);

            return view('users.search' ,['users'=>$users]);
        }
        public function searchResult(Request $request){
            $keyword = $request->input('keyword');
// dd($keyword);

            if(!empty($keyword)){
                $users = User::where('username','like','%'.$keyword.'%')->get();
            }else{
                $users = User::all();
            }
            return view('users.search' ,['users'=>$users],['keyword'=>$keyword]);
        }
        public function get_user($user_id){
            $user = User::with('following')->with('followed')->findOrFail($user_id);
            return response()->json($user);
    }
}
