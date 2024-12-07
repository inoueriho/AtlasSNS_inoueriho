@extends('layouts.login')
@section('content')
<div class="user-profile">
  @if($users->images === 'icon1.png')
    <img class="userprofile-icon1" src="{{ asset('images/'.$users->images) }}" alt="プロフィールアイコン">
  @else
    <img class="userprofile-icon1" src="{{ asset('storage/'.$users->images) }}" alt="プロフィールアイコン">
  @endif
  <div class="userprofile_user">
    <div class="userprofile1">
      <p class="userprofile-hd">ユーザー名</p>
      <p>{{$users->username}}</p>
    </div>
    <div class="userprofile1">
      <p class="userprofile-hd">自己紹介</p>
      <p>{{$users->bio}}</p>
    </div>
    <!-- フォローぼたん -->
    <div class="user-btn">
    @if (auth()->user()->isFollowing($users->id))
    <a href="/search/{{$users->id}}/unfollow" class="btn unfollow_btn">フォロー解除</a>
    @else
    <a href="/search/{{$users->id}}/follow" class="btn follow_btn">フォローする</a>
    @endif
    </div>
  </div>
  <div class="userprofile-content">
  @foreach($posts as $posts)
<li class="userprofile_post">
   @if($users->images === 'icon1.png')
  <img class="profile-icon" src="{{ asset('images/'.$users->images) }}" alt="プロフィールアイコン">
  @else
  <img class="profile-icon" src="{{ asset('storage/'.$users->images) }}" alt="プロフィールアイコン">
  @endif
  <div class="userprofile_post2">
  <div class="userprofile_post-content">
    <p>{{$users->username}}</p>
    <span>{{$posts->updated_at}}</span>
  </div>
  <div class="userprofile_post-content">
    <p>{{$posts->post}}</p>
  </div>
  </div>
</li>
  @endforeach
</div>
</div>
@endsection
