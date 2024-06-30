@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="follow-container">
  <h1>フォローリスト</h1>
  <div class="follow_icon">
    @foreach ($followings as $following)
    <a href="user-profile/{{$following->id}}" ><img src="{{ asset('storage/'.$following->images) }}" alt=""></a>
    <!-- ↑storageの後追加 -->
    @endforeach
  </div>
</div>

@foreach($list as $list)
<!-- 自分以外のユーザーを表示 -->
@if (auth()->user()->isFollowing($list->user_id))
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
