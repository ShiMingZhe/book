<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="csrf-token" content="@{{ csrf_token }}">
    <title>深度学习古诗词</title>
    <link rel="stylesheet" type="text/css" href="{{@asset("/css/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/webapp/css/library.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/webapp/css/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/animate.css@3.5.2/animate.min.css">
</head>
<body>

<div id="app">
    <div id="animate">
        <div id="time">10s</div>
        <div class="animate-item">
            <div class="animate-item-3">
                <div class="animated fadeIn">思&nbsp;&nbsp;考</div>
            </div>
            <div class="animate-item-2">
                <div class="animated fadeIn">让阅读变得更加有效</div>
            </div>
            <div class="animate-item-1">
                <div class="animated fadeIn">
                    <div>深&nbsp;&nbsp;&nbsp;度&nbsp;&nbsp;&nbsp;阅&nbsp;&nbsp;&nbsp;读<br>DEEP READING</div>
                </div>
            </div>
        </div>
        <div id="skip" onclick="skip()">进入资料库</div>
    </div>
    <div id="content">
        <div class="container_main">
            <router-view></router-view>
        </div>
        <footer class="nav">
            <router-link class="nav-item" to="/poetry/welcome">
                <div id="music-item">资料库</div>
            </router-link>
        </footer>
    </div>
</div>
<script type="text/javascript" src="{{@asset("js/app.js")}}"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript" src="http://res2.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script>
    $(function () {
        //setInterval(ChangeTime, 1000);
        $(".animate-item").hide();
        $(".animate-item").fadeIn(3000);
    });

    function ChangeTime() {
        var time;
        time = $("#time").text();
        time = parseInt(time);
        time--;
        if (time <= 0) {
            $("#animate").hide();
            $("#content").show();
        } else {
            $("#time").text(time+'s');
        }
    }

    function skip() {
        $("#animate").hide();
        $("#content").show();
    }
</script>
</body>
</html>