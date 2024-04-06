@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/top/post']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="container">
  <div class="post">
    <img class="profile-icon" src="{{ asset('images/icon1.png')}}" alt="プロフィールアイコン">
    <input class="post-form" type="text" name="post" placeholder="投稿内容を入力してください。">
    <button type="submit" class="btn"><img class="post-img" src="images/post.png" alt="送信"></button>
    {!! Form::close() !!}
  </div>
</div>
@endsection
