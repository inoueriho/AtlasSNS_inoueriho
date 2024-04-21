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
  </div>
</div>
{!! Form::close() !!}
@foreach($list as $list)
<div class="post-content">
<tr>
  <img class="profile-icon" src="{{ asset('images/icon1.png')}}" alt="プロフィールアイコン">
  <td>{{$list->user->username}}</td>
  <td>{{$list->post}}</td>
  <td><span>{{$list->updated_at}}</span></td>
  <td><a class="trash-img" href="/top/{{$list->id}}/delete" onclick="return confirm('こちらの本を削除してもよろしいでしょうか？')"></a></td>
  <td><img class="edit-img" src="images/edit.png" alt="編集ボタン"></td>
</tr>
</div>

@endforeach
@endsection
