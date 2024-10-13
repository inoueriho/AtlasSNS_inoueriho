@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/profile/update-form','enctype' =>'multipart/form-data']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="profile-container">
  <img class="profile-update_icon" src="{{ asset('storage/'.Auth::user()->images) }}" alt="プロフィールアイコン">
  <div class="update">
<!-- ユーザー -->
  <div class="ct-clock">
    <label for="name">ユーザー名</label>
    <input type="text" name="username" id="name" value="{{ Auth::user()->username }}">
  </div>
<!-- メール -->
  <div class="ct-clock">
    <label for="mail">メールアドレス</label>
    <input type="email" name="mail" id="mail" value="{{ Auth::user()->mail }}">
  </div>
<!-- パスワード -->
  <div class="ct-clock">
    <label for="password">パスワード</label>
    <input type="password" name="password" id="password">
      @if ($errors->has('password'))
      <p>{{$errors->first('password')}}</p>
      @endif
  </div>
<!-- パスワードの確認 -->
  <div class="ct-clock">
    <label for="pass-c">パスワード確認</label>
    <input type="password" name="pass-c" id="pass-c">
      <!-- @if ($errors->has('password'))
      <li>{{$errors->first('password')}}</li>
      @endif -->
  </div>
<!-- 自己紹介文 -->
  <div class="ct-clock">
    <label for="bio">紹介文</label>
    <input type="text" name="bio" id="bio" value="{{ Auth::user()->bio }}">
  </div>
<!-- アイコン画像アップロード -->
  <div class="ct-clock">
    <label for="icon-image">アイコン画像</label>
    <input type="file" name="icon-image" id="icon-image">
  </div>
</div>
  <!-- 更新ボタン -->
{{ Form::submit('更新',['class' => 'update-button']) }}
<!-- <a class="btn btn-primary" href="/top">更新</a> -->
</div>
<!-- @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif -->



@endsection
