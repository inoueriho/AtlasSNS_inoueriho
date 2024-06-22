@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/user-profile']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="user-profile">
  <img class="profile-icon" src="{{ asset('images/icon2.png')}}" alt="プロフィールアイコン">
<tr>
  <td><p>ユーザー名</p></td>
  <td><p class="">{{$list->user->username}}</p></td>
  <td><p>自己紹介</p></td>
  <td><p>{{$list->user->bio}}</p></td>
</tr>
</div>

  <td><p class="post-text">{{$list->post}}</p></td>
  <td><span>{{$list->updated_at}}</span></td>
</tr>
