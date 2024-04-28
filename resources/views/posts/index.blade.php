@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/top/post']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="container">
  <div class="post">
    <img class="profile-icon" src="{{ asset('images/icon1.png')}}" alt="プロフィールアイコン">
    <input class="post-form" type="text" name="post" placeholder="投稿内容を入力してください。">
    <button type="submit" class="btn"><img class="post-img" src="images/post.png" alt="送信"></button>
  </div>
</div>
{!! Form::close() !!}
@foreach($list as $list)
<div class="post-content">
<tr>
  <td><img class="profile-icon" src="{{ asset('images/icon1.png')}}" alt="プロフィールアイコン"></td>
  <td><p>{{$list->user->username}}</p></td>
  <td><p class="post-text">{{$list->post}}</p></td>
  <td><span>{{$list->updated_at}}</span></td>
  <td><a class="trash-img" href="/top/{{$list->id}}/delete" onclick="return confirm('こちらの本を削除してもよろしいでしょうか？')"></a></td>
<td>
  <div class="js-modal-open" >
    <div class="edit-img" href="/top/{{$list->id}}/edit" post="{{$list->post}}" post_id="{{$list->id}}"></div>
  </div>
</td>
<!-- モーダルの中身 -->

</tr>
</div>

@endforeach
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_post">
    <form action="/post/edit" method="post">
      @csrf
      <div class="form-group">
        <input type="text" name="upPost" class="edit-post" value=""></input>
        <input type="hidden" name="id" class="modal_id"></input>
        <input type="submit" class="submit"><img class="up-post-img" src="images/edit.png"></input>
      </div>
      {{csrf_field()}}
    </form>
  </div>
</div>
@endsection
