<template>
    <div class="audio-box">
        <div class="audio-container">
            <div class="audio-view">
                <audio src="http://www.mukeen.com/yangcong.mp3" ref="audio"></audio>
                <div class="audio-cover" ></div>
                <div class="audio-body">
                    <h3 class="audio-title">未知歌曲</h3>
                    <div class="audio-backs">
                        <div class="audio-this-time">00:00</div>
                        <div class="audio-count-time">00:00</div>
                        <div class="audio-setbacks">
                            <i class="audio-this-setbacks">
                                <span class="audio-backs-btn"></span>
                            </i>
                            <span class="audio-cache-setbacks">
							</span>
                        </div>
                    </div>
                </div>
                <div class="audio-btn">
                    <div class="audio-select">
                        <!--<div class="audio-prev"></div>-->
                        <div :class="{'audio-play':isPlay,'audio-stop':isStop}" @click="audioPlay"></div>
                        <!--<div class="audio-stop"></div>-->
                        <!--<div class="audio-next"></div>-->
                        <!--<div class="audio-menu"></div>-->
                        <div class="audio-volume" @click="showVolume"></div>
                    </div>
                    <div class="audio-set-volume">
                        <div class="volume-box">
                            <i><span></span></i>
                        </div>
                    </div>
                    <!--<div class="audio-list">
                        <div class="audio-list-head">
                            <p>歌单</p>
                            <span class="menu-close">关闭</span>
                        </div>
                        <ul class="audio-inline">
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery'
    import Aplayer from 'vue-aplayer'
    import Predefine from "element-ui/packages/color-picker/src/components/predefine";
    export default {
        name: "App",
        components: {
            Predefine,
            "aplayer":Aplayer
        },
        data() {
            return {
                isPlay:true,
                isStop:false,
            }
        },
        async mounted () {
            //异步加载，先加载出player再使用
            /*await this.init();*/
            /*let aplayer = this.$refs.player.control;
            aplayer.play();*/
        },
        methods: {
            audioPlay() {
                if (this.isPlay) {
                    this.$refs.audio.play();
                    this.isPlay = false;
                    this.isStop = true;
                } else {
                    this.$refs.audio.pause();
                    this.isPlay = true;
                    this.isStop = false;
                }

            },
            setVolume() {
                this.$refs.audio.volume = volume.value;
            },
            showVolume() {

            }
        }
    }

    /*var audio = document.getElementById("demo");
    var pastime = document.getElementById("pastime");*/

    /*var audio = $('audio')[0];
    // 点击播放/暂停图片时，控制音乐的播放与暂停
    $('#audioPlayer').click(function () {
        if (audio.paused) {
            // 开始播放当前点击的音频
            audio.play();
            $('#audioPlayer').attr('src', './image/pause.png');
        } else {
            audio.pause();
            $('#audioPlayer').attr('src', './image/play.png');
        }
    });

    // 监听音频播放时间并更新进度条
    audio.addEventListener('timeupdate', function () {
        updateProgress(audio);
    }, false);

    /!**
     * 更新进度条与当前播放时间
     * @param {object} audio - audio对象
     *!/
    function updateProgress(audio) {
        var value = audio.currentTime / audio.duration;
        $('#progressBar').css('width', value * 100 + '%');
        $('#progressDot').css('left', value * 100 + '%');
        $('#audioCurTime').html(transTime(audio.currentTime));
    }

    /!**
     * 音频播放时间换算
     * @param {number} value - 音频当前播放时间，单位秒
     *!/
    function transTime(value) {
        var time = "";
        var h = parseInt(value / 3600);
        value %= 3600;
        var m = parseInt(value / 60);
        var s = parseInt(value % 60);
        if (h > 0) {
            time = formatTime(h + ":" + m + ":" + s);
        } else {
            time = formatTime(m + ":" + s);
        }

        return time;
    }

    /!**
     * 格式化时间显示，补零对齐
     * eg：2:4  -->  02:04
     * @param {string} value - 形如 h:m:s 的字符串
     *!/
    function formatTime(value) {
        var time = "";
        var s = value.split(':');
        var i = 0;
        for (; i < s.length - 1; i++) {
            time += s[i].length == 1 ? ("0" + s[i]) : s[i];
            time += ":";
        }
        time += s[i].length == 1 ? ("0" + s[i]) : s[i];

        return time;
    }

    // 监听播放完成事件
    audio.addEventListener('ended', function () {
        audioEnded();
    }, false);

    /!**
     * 播放完成时把进度调回开始的位置
     *!/
    function audioEnded() {
        $('#progressBar').css('width', 0);
        $('#progressDot').css('left', 0);
        $('#audioPlayer').attr('src', 'image/play.png');
    }*/
</script>

<style scoped>
    @charset "utf-8";
    *{
        margin: 0;
        padding: 0;
    }
    body{
        font-family: "微软雅黑";
    }
    ul li{
        list-style-type: none;
    }
    .audio-box{
        width: 100%;
        left: 0;
        background-color: #000;
        background-color: rgba(0,0,0,1);
        color: #fff;
    }
    .audio-container{
        width: 1000px;
        margin: auto;
    }
    .audio-view{
        position: relative;
        padding-left: 100px;
        padding-right: 180px;
        height: 100px;
    }
    .audio-cover{
        width: 100px;
        height: 100px;
        overflow: hidden;
        position: absolute;
        left: 0;
        top: 0;
        background-size: auto 100%;
        background-repeat: no-repeat;
        background-position: center center;
        background-color: #000;
    }
    .audio-cover img{
        display: block;
        height: 100%;
        margin: auto;
    }
    .audio-body{
        padding: 0 10px;
    }
    .audio-title{
        font-weight: 400;
        font-size: 20px;
        line-height: 40px;
        overflow: hidden;
    }
    .audio-backs{
        position: relative;
        padding-left: 60px;
        padding-right: 60px;
        margin-top: 10px;
        height: 20px;
    }
    .audio-this-time,
    .audio-count-time{
        position: absolute;
        top: 0;
        width: 60px;
        font-size: 16px;
        height: 20px;
        line-height: 20px;
    }
    .audio-this-time{
        left: 0;
    }
    .audio-count-time{
        right: 0;
        text-align: right;
    }
    .audio-setbacks{
        height: 6px;
        border-radius: 3px;
        background-color: #333;
    }
    .audio-setbacks{
        position: relative;
        top: 50%;
    }
    .audio-cache-setbacks,
    .audio-this-setbacks{
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 3px;
    }
    .audio-cache-setbacks{
        background-color: #535353;
        z-index: 1;
        cursor: pointer;
    }
    .audio-this-setbacks{
        background-color: #c70c0c;
        z-index: 2;
    }
    .audio-backs-btn{
        position: absolute;
        width: 14px;
        height: 14px;
        margin-top: -7px;
        top: 50%;
        right: -7px;
        background-color: #fff;
        border-radius: 50%;
        cursor: pointer;
    }
    .audio-btn{
        position: absolute;
        width: 150px;
        height: 100px;
        right: 0;
        top: 0;
    }
    .audio-select{
        height: 20px;
        margin-top: 50px;
        width: 150px;
        float: right;
    }
    .audio-select > div{
        width: 20px;
        height: 20px;
        background-size: 100% 100%;
        background-position: center center;
        background-repeat: no-repeat;
        float: left;
        cursor: pointer;
    }
    .audio-select > div + div{
        margin-left: 10px;
    }
    .audio-prev{
        background-image: url('../../../../public/webapp/images/prev.png');
    }
    .audio-next{
        background-image: url('../../../../public/webapp/images/next.png');
    }
    .audio-play{
        background-image: url('../../../../public/webapp/images/play.png');
    }
    .audio-stop{
        background-image: url('../../../../public/webapp/images/pause.png');
    }
    .audio-menu{
        background-image: url('../../../../public/webapp/images/menu.png');
    }
    .audio-volume{
        background-image: url('../../../../public/webapp/images/volume.png');
    }
    .audio-list{
        position: absolute;
        right: 0;
        color: #000;
        background-color: #fff;
        bottom: 100px;
        border: 1px solid #ccc;
        width: 240px;
        border-radius: 5px;
        padding-top: 10px;
        display: none;
    }
    .audio-list-head{
        position: relative;
        padding-bottom: 10px;
    }
    .audio-list-head p{
        padding-left: 8px;
        font-size: 18px;
    }
    .audio-list-head span{
        position: absolute;
        right: 8px;
        top: 0;
        font-size: 12px;
        display: block;
        width: 35px;
        line-height: 25px;
        border: 1px solid #ccc;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
    }
    .audio-inline{
        height: 165px;
        overflow-y: scroll;
    }
    .audio-inline li{
        font-size: 16px;
        line-height: 2;
        padding-left: 8px;
        padding-right: 8px;
        border-top: 1px solid #ccc;
    }
    .audio-inline a{
        font-size: inherit;
        color: inherit;
        text-decoration: none;
        height: 32px;
        overflow: hidden;
        display: block;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .menu-show,
    .audio-show-volume{
        display: block !important;
    }
    .audio-set-volume{
        background-color: #000;
        background-color: rgba(0,0,0,0.5);
        position: absolute;
        bottom: 100px;
        width: 30px;
        height: 120px;
        right: 5px;
        z-index: 999;
        display: none;
    }
    .volume-box{
        width: 5px;
        margin: auto;
        display: block;
        position: relative;
        background-color: #000;
        border-radius: 2.5px;
        height: 100px;
        bottom: -10px;
    }
    .volume-box span{
        display: block;
        width: 11px;
        height: 11px;
        position: absolute;
        background-color: #fff;
        border-radius: 50%;
        margin-left: -5.5px;
        margin-top: -5.5px;
        left: 50%;
        cursor: pointer;
    }
    .volume-box i{
        position: absolute;
        width: 100%;
        border-radius: 2.5px;
        background-color: #c70c0c;
        height: 0;
        display: block;
        bottom: 0;
    }
</style>