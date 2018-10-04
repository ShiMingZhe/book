<!doctype html>
<html>
<head>
    <meta charset=utf-8>
    <title>古诗词|木客网</title>
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.4">
    <meta name="MobileOptimized" content="240">
    <link href="{{@asset("/mobile/player/css/blue.css")}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{@asset("/mobile/player/js/jquery.js")}}"></script>
    <script type="text/javascript" src="{{@asset("/mobile/player/js/jquery.jplayer.js")}}"></script>
    <script type="text/javascript" src="{{@asset("/mobile/player/js/lrc.js")}}"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            outline:none;
        }
        ul, ol, dl {
            list-style: none;
        }

        .music_box{margin:50px auto;width:422px;}
        .content {width: 402px;height:200px;overflow:hidden;padding:10px;
            background-image: url("{{@asset('/mobile/img/lrcbj.jpg')}}");}
        #lrc_list{margin:10px auto;}
        #lrc_list li{font:normal 14px/2.1 'microsoft yahei';text-align:center;color: #fefefe;}
        #lrc_list li.hover {color:#7FFF00;font-weight:bold;}
        .jp-title ul li {size: 5px;font-family: FontAwesome;}
    </style>
    <script>
        $(document).ready(function(){
            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        mp3:"{{@asset($url)}}" //mp3的播放地址
                    });
                },
                timeupdate: function(event) {
                    if(event.jPlayer.status.currentTime==0){
                        time = "";
                    }else {
                        time = event.jPlayer.status.currentTime;
                    }
                },
                play: function(event) {
                    //点击开始方法调用lrc。start歌词方法 返回时间time
                    $.lrc.start($('#lrc_content').val(), function() {
                        return time;
                    });
                },
                ended:function(event){
                    $("#lrc_list").removeAttr("style").html("<li>歌曲播放完毕！</li>");
                },
                swfPath: "/js",  		//存放jplayer.swf的决定路径
                solution:"html, flash", //支持的页面
                supplied: "mp3",		//支持的音频的格式
                wmode: "window"
            });
        });
    </script>
</head>
<body>
<textarea id="lrc_content" name="textfield" cols="70" rows="10" style="display:none;">
    {{$poetry}}
</textarea>
<div class="music_box">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div id="jp_container_1" class="jp-audio">
        <div class="jp-type-single">
            <div class="jp-gui jp-interface">
                <ul class="jp-controls">
                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                    <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                    <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
                <div class="jp-time-holder">
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
                    <ul class="jp-toggles">
                        <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                        <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                    </ul>
                </div>
            </div>
            <div class="jp-title">
                <ul>
                    <li>诗词：{{$title}}&nbsp;&nbsp;——&nbsp;&nbsp;作者：{{$author}}</li>
                </ul>
            </div>
            <div class="jp-no-solution"> <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>. </div>
        </div>
    </div>
    <div class="content">
        <ul id="lrc_list">
            <li>开始学习诗词吧！</li>
        </ul>
    </div>
</div>
</body>
</html>