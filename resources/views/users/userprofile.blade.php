@extends('layouts.login')
@section('content')
<div class="user-profile">
  <img class="profile-icon" src="{{ asset('storage/'.$users->images) }}" alt="プロフィールアイコン">
  <div class="userprofile_user">
    <tr>
      <th><p>ユーザー名</p></th>
      <td><p>{{$users->username}}</p></td>
    </tr>
    <tr>
      <th><p>自己紹介</p></th>
      <td><p>{{$users->bio}}</p></td>
    </tr>
    <!-- フォローぼたん -->
    @if (auth()->user()->isFollowing($users->id))
    <a href="/search/{{$users->id}}/unfollow" class="btn unfollow_btn">フォロー解除</a>
    @else
    <a href="/search/{{$users->id}}/follow" class="btn follow_btn">フォローする</a>
    @endif
  </div>
  @foreach($posts as $posts)
<div class="userprofile_post">
  <img class="profile-icon" src="{{ asset('storage/'.$users->images) }}" alt="プロフィールアイコン">
  <td><p>{{$users->username}}</p></td>
  <td><p>{{$posts->post}}</p></td>
  <td><span>{{$posts->updated_at}}</span></td>
</div>
  @endforeach

</div>
@endsection
