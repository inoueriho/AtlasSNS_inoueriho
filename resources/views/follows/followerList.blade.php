@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="follower-container">
  <h1>フォロワーリスト</h1>
  <div class="follower_icon">
    @foreach ($followers as $followers)
    <a href="user-profile/{{$followers->id}}"><img src="{{ asset('storage/'.$followers->images) }}" alt=""></a>
     <!-- ↑情報がログインユーザーになってる。 -->
    @endforeach
  </div>
</div>

@foreach($list as $list)
@if (auth()->user()->isFollowed($list->user_id))
<div class="post-content">
<tr>
  <td><a href="user-profile/{{$list->user_id}}"><img class="profile-icon" src="{{ asset('storage/'.$list->user->images) }}" alt="プロフィールアイコン"></a></td>
  <td><p class="post-name">{{$list->user->username}}</p></td>
  <td><p class="post-text">{{$list->post}}</p></td>
  <td><span>{{$list->updated_at}}</span></td>
@endif
</tr>
</div>

@endforeach

@endsection
