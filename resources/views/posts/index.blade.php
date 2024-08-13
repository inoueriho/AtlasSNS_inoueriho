@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/top/post']) !!}
@csrf
<div class="post-container">
  <div class="post">
    <img class="profile-icon" src="{{ asset('storage/'.Auth::user()->images) }}" alt="プロフィールアイコン">
    <input class="post-form" type="text" name="post" placeholder="投稿内容を入力してください。">
    <button type="submit" class="post-btn"><img class="post-img" src="images/post.png" alt="送信"></button>
    <input type="hidden" name="id" value="Auth::user()->id">
  </div>
</div>
{!! Form::close() !!}
@foreach($list as $list)
<li class="post-content">
  <img class="profile-icon" src="{{ asset('storage/'.$list->user->images) }}" alt="プロフィールアイコン">
  <div class="post-content1">
    <div class="post-content2">
      <p>{{$list->user->username}} </p>
      <p class="post-content3"> {{$list->updated_at}} </p>
    </div>
    <div class="post-content2">
      <p>{{$list->post}}</p>
      @if(Auth::user()->id == $list->user_id)
      {{ csrf_field() }}
      <div class="post-content3">
        <a class="js-modal-open" href="{{$list->id}}" post="{{$list->post}}" post_id="{{$list->id}}">
          <img class="edit-img" src="{{asset('/images/edit.png')}}" alt="" post="{{$list->post}}" post_id="{{$list->id}}">
        </a>
        <a class="trash-img" href="/top/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></a>
      </div>
      @endif
    </div>
  </div>
</li>
@endforeach
<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
    <div class="modal-container">
      <form action="/post/update" method="post">
        <div class="modal_post">
          @csrf
          <div class="form-group">
            <input type="text" name="upPost" class="edit-post" value=""></input>
            <input type="hidden" name="id" class="modal_id" value=""></input>
          </div>
        </div>
            <input type="image" class="up-post-img" src="images/edit.png" alt="更新する">
      </form>
  </div>

</div>
@endsection
