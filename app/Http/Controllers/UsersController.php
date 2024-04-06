<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }
