@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="register-container">
  <div class="register-content">
    <h2>新規ユーザー登録</h2>

    <div class="register-username">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
    </div>

    <div class="register-mail">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    </div>

    <div class="register-pass">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}
    </div>

    <div class="register-pass2">
    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
    </div>

    <div class="register-btn">
    {{ Form::submit('登録') }}
    </div>

    <p class="login-back"><a href="/login">ログイン画面へ戻る</a></p>
  </div>
   {!! Form::close() !!}
</div>



@endsection
