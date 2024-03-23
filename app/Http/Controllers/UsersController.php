<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function profile(Request $request) {
       $id = $request->input('id');
       $username = $request->input('username');
       $mail = $request->input('mail');
       $password = $request->input('password');
       $bio = $request->input('bio');

       User::where('id',$id)->update([
        'username' => $username,
        'mail' => $mail,
        'password' => Hash::make($request->password),
        'bio' => $bio,
       ]);

       return view('users.profile');
    }

    public function update(Request $request){
        // バリデーションの設定
            $request->validate([
                'username' => ' required | min:2 | max:12',
                'mail' => ' required | unique:users,mail| email | min:5 | max:40',
                'password' => ' required | alpha_dash | min:8 | max:20',
                'bio' => ' max:150 ',
                'image' => 'image | mimes:jpg,png,bmp,gif,svg',
                 ]);

    $user ->update([
        "username" => $request->username,
        "mail" => $request->mail,
        "password" => $request->password,
        "bio" => $request->bio,
        "image" => $request->image,
        // 'username' => $request->input('username'),
        // 'mail' => $request->input('mail'),
        // 'password' => bcrypt($request->input('password')),
        // 'bio' => $request->input('bio'),
        // 'image' => basename($image)
    ]);
    return redirect('users.profile');
}
}
