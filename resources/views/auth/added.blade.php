@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-container">
    <div class="added-content1">
      <p>{{ session('username' ) }}さん</p>
      <p>ようこそ！AtlasSNSへ！</p>
    </div>

    <div class="added-content2">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>
    <p class="login-back_btn"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection
