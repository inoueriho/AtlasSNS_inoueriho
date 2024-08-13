@extends('layouts.login')

@section('content')
<form action="/search/result" method="get" class="search-form">
  @csrf
  <div class="search">
    <div class="search1">
      <input class="search-window" type="search" name="keyword" placeholder="ユーザー名" value="@if(isset($keyword)){{$keyword}}@endif">
      <button type="submit" class="btn"><img class="search-img" src="{{asset('images/search.png')}}" alt="検索"></button>

      <div class="keyword">
      @if(!empty($keyword))
      <p>検索ワード:{{$keyword}}</p>
      @endif
    </div>
    </div>
          <!-- 検索ワードの表示 -->

  </div>
</form>



  <div class="container-list">
    <table class="table table-hover">
      @foreach ($users as $user)
      @if ($user->id !== Auth::user()->id)<!-- 自分以外のユーザーを表示 -->

      <ul class="search-content">
        <li><img class="icon-img" src="{{ asset('storage/'.$user->images) }}" alt="ユーザーアイコン"></li>
        <li class="search-name">{{$user->username }}</li>

        <!-- ログインユーザーがフォローしていたらフォロー解除ボタンを表示 -->
    @if (auth()->user()->isFollowing($user->id))
    <a href="/search/{{$user->id}}/unfollow" class="unfollow_btn">フォロー解除</a>
    @else
    <a href="/search/{{$user->id}}/follow" class="follow_btn">フォローする</a>
    @endif
      </ul>
      @endif
      @endforeach
    </table>
  </div>
{!! Form::close() !!}
@endsection
