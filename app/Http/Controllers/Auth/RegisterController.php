<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            // バリデーションの設定
            $request->validate([
                'username' => ' required | min:2 | max:12',
                'mail' => ' required | unique:users,mail| email | min:5 | max:40',
                'password' => ' required | alpha_dash | min:8 | max:20',
                'password_confirmation' => ' required |string | alpha_num | min:8 | max:20',
                 ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
                // 'icon_path' => 'public/images' . 'icon1.png' //初期アイコンはpublicから参照させる
            ]);
                //  sessionを使ってユーザ名を表示させる
                $request->session()->put('username' , $username);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
