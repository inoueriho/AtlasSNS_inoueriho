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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
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
            <ul>
              <li><a href="/top">HOME</a></li>
              <li><a href="/profile">プロフィール編集</a></li>
              <li><a href="/logout">ログアウト</a></li>
            </ul>
        </nav>
            <img src="{{ asset('images/icon1.png')}}">
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
                <span><p>〇〇名</p></span>
                </div>
                <p><a class="btn" href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <span><p>〇〇名</p></span>
                </div>
                <p><a class="btn" href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p><a class="search-btn" href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
