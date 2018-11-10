<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="csrf-token" content="@{{ csrf_token }}">
    <title>木客网</title>
    <link rel="stylesheet" type="text/css" href="{{@asset("/css/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("/webapp/css/app.css")}}">
    <link href="{{@asset("/mobile/player/css/player.css")}}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div id="app">
        {{--<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <router-link to="/index1">木客网单页应用</router-link>
                </div>
            </div>
        </nav>--}}
        <div class="container main">
            <router-view></router-view>
        </div>
        <footer class="nav">
            <router-link class="nav-item" to="/listen">听诗词</router-link>
            <router-link class="nav-item" to="/index1">资料库</router-link>
        </footer>
    </div>
    <script type="text/javascript" src="{{@asset("js/app.js")}}"></script>
</body>
</html>