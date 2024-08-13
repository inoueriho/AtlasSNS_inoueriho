@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<div class="login-container">
  <div class="login-content">
    <h2>AtlasSNSへようこそ</h2>
    <div class="login-mail">
      {{ Form::label('メールアドレス') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="login-pass">
      {{ Form::label('パスワード') }}
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class="login-btn">
      {{ Form::submit('ログイン') }}
    </div>
    <p class="login-register"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
  {!! Form::close() !!}
</div>
@endsection
