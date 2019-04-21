<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="csrf-token" content="@{{ csrf_token }}">
    <title>深度学习古诗词</title>
    <link rel="stylesheet" type="text/css" href="{{@asset("/css/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/webapp/css/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/css/bootstrap.min.css")}}">
</head>
<body>
    <div id="app">
        <div class="container_main">
            <router-view></router-view>
        </div>
        <footer class="nav">
            <router-link class="nav-item" to="/qr/{{$uniqId}}">
                <div class="glyphicon glyphicon-music" id="music-item"></div>
                <div id="music-item"><span>听一听</span></div>
            </router-link>
            <router-link class="nav-item" to="/library">
                <div class="glyphicon glyphicon-book" id="music-item"></div>
                <div id="music-item"><span>资料库</span></div>
            </router-link>
        </footer>
    </div>
    <script type="text/javascript" src="{{@asset("js/app.js")}}"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
    <script type="text/javascript" src="http://res2.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
</body>
</html>