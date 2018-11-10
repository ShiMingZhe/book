<div class="bui-page">
    <header class="bui-bar">
        <div class="bui-bar-left"></div>
        <div class="bui-bar-main">听诗词</div>
        <div class="bui-bar-right"></div>
    </header>
    <main>
        <script>
            $(document).ready(function(){
                $("#jquery_jplayer_1").jPlayer({
                    ready: function (event) {
                        $(this).jPlayer("setMedia", {
                            mp3:"http://www.mukeen.com/yangcong.mp3" //mp3的播放地址
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
                        //点击开始方法调用lrc.start歌词方法 返回时间time
                        $.lrc.start($('#lrc_content').val(), function() {
                            return time;
                        });
                    },
                    ended:function(event){
                        $("#lrc_list").removeAttr("style").html("<li>诗词播放完毕</li>");
                    },
                    swfPath: "/js",  		//存放jplayer.swf的决定路径
                    solution:"html, flash", //支持的页面
                    supplied: "mp3",		//支持的音频的格式
                    wmode: "window"
                });
            });
        </script>
        <textarea id="lrc_content" name="textfield" cols="70" rows="10" style="display:none;">
        {{$poetry}}
        </textarea>
        <div class="music_box">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio">
                <div class="jp-type-single">
                    <div class="jp-gui jp-interface container-fluid">
                        <div class="row">
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="jp-time-holder">
                                <div class="jp-current-time"></div>
                                <div class="jp-duration"></div>
                                <ul class="jp-toggles">
                                    <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                    <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="jp-controls">
                                <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                <li class="jp-volume-bar">
                                    <div class="jp-volume-bar-value"></div>
                                </li>
                                <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
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
    </main>
</div>
