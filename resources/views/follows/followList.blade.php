@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="follow-container">
  <h1>フォローリスト</h1>
  <div class="follow_icon">
    @foreach ($followings as $following)
    <a href="user-profile/{{$following->id}}" >
      @if($following->images === 'icon1.png')
        <img class="follow_icon-img" src="{{ asset('images/'.$following->images) }}" alt="プロフィールアイコン">
      @else
        <img class="follow_icon-img" src="{{ asset('storage/'.$following->images) }}" alt="プロフィールアイコン">
      @endif
    </a>
    <!-- ↑storageの後追加 -->
    @endforeach
  </div>



<div class="follow-content">
  @foreach($list as $list)
<!-- 自分以外のユーザーを表示 -->
@if (auth()->user()->isFollowing($list->user_id))
<li class="follow-list">
  <a href="user-profile/{{$list->user_id}}">
    @if($list->user->images === 'icon1.png')
      <img class="followlist-icon" src="{{ asset('images/'.$list->user->images) }}" alt="プロフィールアイコン">
    @else
      <img class="followlist-icon" src="{{ asset('storage/'.$list->user->images) }}" alt="プロフィールアイコン">
    @endif
  </a>
  <div class="follow-list_post">
    <div class="follow-list_post_content">
      <p>{{$list->user->username}}</p>
      <span>{{$list->updated_at}}</span>
    </div>
    <div class="follow-list_post_content">
      <p>{{$list->post}}</p>
    </div>
  </div>
@endif

</li>
@endforeach
</div>

</div>
@endsection
