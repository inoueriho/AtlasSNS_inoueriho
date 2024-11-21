<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{asset('images/atlas.png')}}"></a></h1>
        <div class="head-name">
            <p>{{ Auth::user()->username }} さん</p>
            <button type="button" class="menu-btn active">
            <span class="inn"></span>
            </button>
        <nav class="menu">
            <ul class="nav">
              <li class="nav-content"><a href="/top">HOME</a></li>
              <li class="nav-content"><a href="/profile">プロフィール編集</a></li>
              <li class="nav-content"><a href="/logout">ログアウト</a></li>
            </ul>
        </nav>
            @if(Auth::user()->images === 'icon1.png')
              <img class="profile-icon" src="{{ asset('images/'.Auth::user()->images) }}" alt="プロフィールアイコン">
            @else
              <img class="profile-icon" src="{{ asset('storage/'.Auth::user()->images) }}" alt="プロフィールアイコン">
            @endif
        </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                  <p>フォロー数</p>
                  <!-- isFollowing使ってしまったらUser.phpで($user_id)を定義してるからこっちでも指定しなければいけなくなる。だからそれじゃなくてフォローの方を数える -->
                  <p>{{ auth()->user()->follow()->count() }}名</p>
                </div>

                <div class="list-btn">
                  <p><a class="btn" href="/follow-list">フォローリスト</a></p>
                </div>

                <div>
                  <p>フォロワー数</p>
                  <p>{{ auth()->user()->followUsers()->count() }}名</p>
                </div>

                <div class="list-btn">
                  <p><a class="btn" href="/follower-list">フォロワーリスト</a></p>
                </div>
            </div>
            <div class="search-btn"><a href="/search"><p>ユーザー検索</p></a></div>
        </div>
    </div>
    <footer>
    </footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
