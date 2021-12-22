
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset ('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/style.css') }}">
    <!--Jqueryリンク-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
            <h1><a class="main_logo" href="/top"><img src="{{ asset ('/images/main_logo.png') }}"></a></h1>
            <div id="" class="menu-trigger">
                <div>
                    <p class="accordion-title">{{ auth()->user()->username }}さん</p>
                </div>
                <div>
                    <ul class="accordion-content gnavi">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/users/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
                <div>
                    <a class="header_img"><img src="{{ asset ('/images/'.auth()->user()->images) }}"></a>
                </div>
            <div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div class="side_follow">
                <p>{{ auth()->user()->username }}さんの</p>
                <div class="follow_count">
                <p>フォロー数</p>
                <p>{{$follow}}名</p>
                </div>
            </div>
            <p class="list_btn"><a href="/follows/followList">フォローリスト</a></p>
            <div class="side_follower">
                <div class="follow_count">
                <p>フォロワー数</p>
                <p>{{$follower}}名</p>
                </div>
            </div>
            <p class="list_btn"><a href="/follows/followerList">フォロワーリスト</a></p>
            <div class="search_side">
            <p class="list_btn search_btn"><a href="/users/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
