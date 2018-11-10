<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title></title>
    <link rel="stylesheet" href="{{@asset("player/css/player.css")}}"/>
    <script src="http://cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>
</head>
<body>
<div class="wrapper">
    <div id="bg" class="bg">
        <div class="bg-cover"></div>
    </div>
    <div class="title">
        <div class="music-info">
            <div class="song" id="songName"></div>
            <div class="artist" id="artist"></div>
        </div>
    </div>
    <div class="play-board">
        <img id="needle" class="play-needle pause-needle" src="{{@asset("player/images/play_needle.png")}}"/>

        <div class="disk-bg"></div>
        <div class="disk-cover disk-cover-animation" style="display: none">
            <img class="album" src="{{@asset("player/images/placeholder_disk_play_song.png")}}"/>
            <img class="disk-border" src="{{@asset("player/images/play_disc.png")}}"/>
        </div>
        <div class="disk-cover disk-cover-animation">
            <img class="album" src="{{@asset("player/images/placeholder_disk_play_song.png")}}"/>
            <img class="disk-border" src="{{@asset("player/images/play_disc.png")}}"/>
        </div>
        <div class="disk-cover disk-cover-animation" style="display: none">
            <img class="album" src="{{@asset("player/images/placeholder_disk_play_song.png")}}"/>
            <img class="disk-border" src="{{@asset("player/images/play_disc.png")}}"/>
        </div>
        <audio id="player"></audio>
        <div class="footer">
            <div class="process" id="process">
                <span id="currentTime">00:00</span>

                <div class="process-bar">
                    <div class="rdy"></div>
                    <div class="cur">
                        <span id="processBtn" class="process-btn c-btn"></span>
                    </div>
                </div>
                <span id="totalTime">00:00</span>
            </div>
            <div class="control" id="controls">
                <span class="c-btn loop-btn" onclick="ctx.loop()"></span>
                <span class="pre c-btn" onclick="ctx.prev()"></span>
                <span class="play c-btn" onclick="ctx.play()"></span>
                <span class="pause c-btn" onclick="ctx.pause()" style="display: none"></span>
                <span class="next c-btn" onclick="ctx.next()"></span>
                <span class="c-btn list-btn" onclick="ctx.showPlayList()"></span>
            </div>
        </div>
    </div>
    <div class="play-list" id="playList">
        <div class="list-title">播放列表（<span id="playListCount">0</span>）</div>
        <ul class="list-content" id="listContent">
        </ul>
    </div>
</div>
<script src="{{@asset("player/js/player.js")}}"></script>
</body>
</html>