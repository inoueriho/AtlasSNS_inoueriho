@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="follower-container">
  <h1>フォロワーリスト</h1>
  <div class="follower_icon">
    @foreach ($followers as $followers)
    <a href="user-profile/{{$followers->id}}"><img class="follower_icon-img" src="{{ asset('storage/'.$followers->images) }}" alt=""></a>
     <!-- ↑情報がログインユーザーになってる。 -->
    @endforeach
  </div>



<div class="follower-content">
  @foreach($list as $list)
@if (auth()->user()->isFollowed($list->user_id))
<li class="follower-list">
  <a href="user-profile/{{$list->user_id}}"><img class="followerlist-icon" src="{{ asset('storage/'.$list->user->images) }}" alt="プロフィールアイコン"></a>
  <div class="follower-list_post">
    <div class="follower-list_post_content">
      <p class="post-name">{{$list->user->username}}</p>
      <span>{{$list->updated_at}}</span>
    </div>
    <div class="follower-list_post_content">
      <p class="post-text">{{$list->post}}</p>
    </div>
  </div>
@endif
</li>
@endforeach
</div>


</div>
@endsection
