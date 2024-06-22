@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/follow-list']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div>
  <h1>フォロワーリスト</h1>
  <div class="follower_icon">
    @foreach ($followers as $followers)
    <a href=""><img src="{{ asset('images/icon1.png') }}" alt=""></a>
     <!-- ↑アイコンimages書き方違う　あとで訂正 -->
    @endforeach
  </div>
</div>

@foreach($list as $list)
@if (auth()->user()->isFollowed($list->user_id))
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
