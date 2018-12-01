<template>
    <div class="audio-box">
        <div id="lrc_content"></div>
        <div class="audio-container">
            <div class="audio-view">
                <audio src="http://www.mukeen.com/yangcong.mp3" ref="audio" @timeupdate="updateTime"></audio>
                <!--<div class="audio-cover" ></div>-->
                <div class="audio-body">
                    <div class="audio-title">{{poetry_content.title}}</div>
                    <div class="audio-backs">
                        <div class="audio-setbacks" @click="setProgress">
                            <i class="audio-this-setbacks">
                                <span class="audio-backs-btn"></span>
                            </i>
                            <span class="audio-cache-setbacks">
							</span>
                        </div>
                        <div class="audio-time">
                            <div class="audio-this-time">{{currentTime}}</div>
                            <div class="audio-count-time">{{duration}}</div>
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
                        <div class="volume-box" @click="set_voluem">
                            <i><span></span></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery'
    import Predefine from "element-ui/packages/color-picker/src/components/predefine";
    export default {
        name: "App",
        components: {
            Predefine
        },
        data() {
            return {
                isPlay:true,
                isStop:false,
                currentTime:"00:00",
                duration:"00:00",
                lrc_index:[],
                lrc_content:[],
                lrc_tmp:'',
                poetry_content:''
            }
        },
        async mounted () {/*36b53bc405f81442ded755027b43c676*/
            let uniqId = this.$route.params.uniqId;
            this.$http.get('/findPoetryContent/'+uniqId).then(response => {
                this.poetry_content = response.body;
                let content = this.setLrc();
                let html = '';
                let lrc_index = [];
                let lrc_content = [];
                content.forEach(function (val, index) {
                    html += "<p>"+val+"</p>";
                    lrc_index.push(index);
                    lrc_content[index] = val;
                });
                this.lrc_index = lrc_index;
                this.lrc_content = lrc_content;
                $("#lrc_content").html(html);
            }, response => {
                console.log('error');
            });
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
            set_voluem(event) {
                let v_height = $(".volume-box").height();
                let v_layerY = event.layerY;
                let V_totalHeight = v_height - v_layerY;
                $(".volume-box i").height(V_totalHeight);
                this.$refs.audio.volume = V_totalHeight / v_height;
            },
            updateTime (event) {
                let interval = event.target.currentTime | 0;
                let interDuration = event.target.duration;
                this.duration = (interDuration / 60 | 0) + ':' + (interDuration % 60 | 0);
                let munite = interval / 60 | 0;
                let secend = interval % 60;
                if (secend < 60) {
                    munite = '0'+munite;
                }
                if (secend < 10) {
                    secend = '0'+secend;
                }
                this.currentTime = munite+':'+secend;
                $(".audio-this-setbacks").width((interval / interDuration) * 100 + '%');
                let content = this.setLrc();
                let lrc_content = this.lrc_content;
                if (content[interval] && this.lrc_tmp !== interval) {
                    let html = this.updateLrc(interval,lrc_content,'#fff');
                    $("#lrc_content").html(html);
                    this.lrc_tmp = this.lrc_index.shift();
                    let prev_all = $("#currentPosition").prevAll();
                    prev_all.remove();
                }
            },
            setProgress(event) {
                let len = $(".audio-setbacks").width();
                let layer_x = event.layerX;
                let duration = this.$refs.audio.duration;
                this.$refs.audio.currentTime = (layer_x / len) * duration;
            },
            setLrc() {
                let contentObj = this.poetry_content;
                let content = contentObj.content;
                let tmp = content.split("[");
                let html = [];
                for (let i = 0;i < tmp.length; i++) {
                    let line_arr = tmp[i].split(']');
                    if (line_arr) {
                        let text = line_arr[1];
                        let time = line_arr[0];
                        let tmp_dot = time.split('.');
                        let ms = tmp_dot[1];/*毫秒*/
                        let tmp_second = tmp_dot[0].split(':');
                        let m = tmp_second[0];/*分*/
                        let s = tmp_second[1];/*秒*/
                        let total_time = parseInt(m * 60) + parseInt(s);
                        if (text) {
                            html[total_time] = text;
                        }
                    }
                }

                return html;
            },
            updateLrc(currentTime,content,color) {
                let html = '';
                content.forEach(function (val,index) {
                    if (index == currentTime) {
                        html += "<p id='currentPosition' style='color:"+color+";font-size: 23px;'>"+ val +"</p>";
                    }
                    html += "<p>"+ val + "</p>";
                });

                return html;
            },
            showVolume() {
                $(".audio-set-volume").toggle();
            }
        }
    }
</script>

<style scoped>
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
    #lrc_content {
        width: 100%;
        height: 50%;
        text-align: center;
        overflow: hidden;
        padding-top: 100px;
        font-size: larger;
        color: #fff;
    }
    .audio-box{
        width: 100%;
        height: 100%;
        left: 0;
        /*background-color: #f0ad4e;*/
        position: relative;
        background-color: rgba(240, 173, 78,1);
        color: #fff;
    }
    .audio-container{
        width: 100%;
        position: absolute;
        bottom: 50px;
        background-color: #f0ad4e;
    }
    .audio-view{
        width: 100%;
        height: 100px;
    }
    .audio-body{
        width: 80%;
        height: 100%;
        padding-left: 5%;
        padding-right: 5%;
        float: left;
    }
    .audio-title{
        width: 100%;
        height: 30px;
        line-height: 30px;
    }
    .audio-backs{
        width: 100%;
        height: 70px;
    }
    .audio-time {
        width: 100%;
        height: 30px;
        margin-top: 20px;
        float: left;
    }
    .audio-this-time,
    .audio-count-time{
        width: 20%;

    }
    .audio-this-time{
        float: left;
        left: 0;
    }
    .audio-count-time{
        float: right;
        right: 0;
        text-align: right;
    }
    .audio-setbacks{
        float: left;
        width: 100%;
        height: 6px;
        border-radius: 3px;
        background-color: #333;
    }
    .audio-setbacks{
        position: relative;
        top: 10%;
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
        background-color: #80ff9d;
        width: 0px;
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
        float: right;
        width: 20%;
        height: 100px;
        line-height: 100px;
    }
    .audio-select{
        height: 20px;
        margin-top: 30px;
        width: 100%;
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

    .audio-set-volume {
        background-color: #d3d6d6;
        background-color: rgba(0,0,0,0.5);
        position: absolute;
        bottom: 68px;
        width: 30px;
        height: 120px;
        z-index: 999;
        display:block;
        margin-left: 23px;
        float: left;
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