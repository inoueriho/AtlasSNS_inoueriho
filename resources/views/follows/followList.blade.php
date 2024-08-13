@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="follow-container">
  <h1>フォローリスト</h1>
  <div class="follow_icon">
    @foreach ($followings as $following)
    <a href="user-profile/{{$following->id}}" ><img class="follow_icon-img" src="{{ asset('storage/'.$following->images) }}" alt=""></a>
    <!-- ↑storageの後追加 -->
    @endforeach
  </div>



<div class="follow-content">
  @foreach($list as $list)
<!-- 自分以外のユーザーを表示 -->
@if (auth()->user()->isFollowing($list->user_id))
<li class="follow-list">
  <a href="user-profile/{{$list->user_id}}"><img class="followlist-icon" src="{{ asset('storage/'.$list->user->images) }}" alt="プロフィールアイコン"></a>
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
