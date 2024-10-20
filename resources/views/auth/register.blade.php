@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="register-container">
  <div class="register-content">
    <h2>新規ユーザー登録</h2>

    <div class="register-username">
    {{ Form::label('ユーザー名') }}
      @if ($errors->has('username'))
      <p class="error-message">{{$errors->first('username')}}</p>
      @endif
    {{ Form::text('username',null,['class' => 'input']) }}
    </div>

    <div class="register-mail">
    {{ Form::label('メールアドレス') }}
      @if ($errors->has('mail'))
      <p class="error-message">{{$errors->first('mail')}}</p>
      @endif
    {{ Form::text('mail',null,['class' => 'input']) }}
    </div>

    <div class="register-pass">
    {{ Form::label('パスワード') }}
      @if ($errors->has('password'))
      <p class="error-message">{{$errors->first('password')}}</p>
      @endif
    {{ Form::password('password',null,['class' => 'input']) }}
    </div>

    <div class="register-pass2">
    {{ Form::label('パスワード確認') }}
      @if ($errors->has('password_confirmation'))
      <p class="error-message">{{$errors->first('password_confirmation')}}</p>
      @endif
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
