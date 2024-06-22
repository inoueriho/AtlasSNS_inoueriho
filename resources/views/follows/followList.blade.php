@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div>
  <h1>フォローリスト</h1>
  <div class="follow_icon">
    @foreach ($followings as $following)
    <a href=""><img src="{{ asset('images/icon1.png') }}" alt=""></a>
    <!-- ↑アイコンimages書き方違う　あとで訂正 -->
    @endforeach
  </div>
</div>

@foreach($list as $list)
<!-- 自分以外のユーザーを表示 -->
@if (auth()->user()->isFollowing($list->user_id))
<div class="post-content">
<tr>
  <td><img class="profile-icon" src="{{ asset('images/icon1.png')}}" alt="プロフィールアイコン"></td>
  <td><p class="post-name">{{$list->user->username}}</p></td>
  <td><p class="post-text">{{$list->post}}</p></td>
  <td><span>{{$list->updated_at}}</span></td>
@endif

</tr>
</div>

@endforeach

@endsection
