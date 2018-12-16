<template>
    <div class="audio-box">
        <div id="lrc_content"></div>
        <div id="content-detail" v-html="poetry_content.sub_content"></div>
        <div class="audio-container">
            <div class="audio-view">
                <audio :src="poetry_content.mp3_url" ref="audio" @timeupdate="updateTime"></audio>
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
                        <div class="glyphicon glyphicon-th-large" @click="audoMenu"></div>
                        <div :class="{'glyphicon glyphicon-play':isPlay,'glyphicon glyphicon-pause':isStop}" @click="audioPlay"></div>
                        <div class="glyphicon glyphicon-share-alt" @click="share"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-display" v-if="is_close">
            <div class="bottom-content">
                <scroller>
                    <a :href="'/qr/'+item.uniq_code" v-if="item.uniq_code" v-for="(item, index) in poetry_list">
                        <li><span class="bottom-index">{{ index +1 }}</span>{{item.title}}</li>
                    </a>
                    <span class="bottom-load" v-show=" poetry_list.length%10 == 0 " @click="getData(poetry_list.length)" v-cloak>{{more_load}}</span>
                </scroller>
            </div>
            <div class="bottom-display-close" @click="bottomDisplayClose">关闭</div>
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
                poetry_content:'',
                is_close:false,//是否关闭音频菜单
                poetry_list:[],//音频菜单
                more_load:'点击加载更多',
            }
        },
        async mounted () {
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
            });

            this.$http.get('/getSignature').then(response => {
                let data = response.body;
                wx.ready(function () {   //需在用户可能点击分享按钮前就先调用
                    wx.config({
                        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                        appId: data.appId, // 必填，公众号的唯一标识
                        timestamp: data.timestamp, // 必填，生成签名的时间戳
                        nonceStr: data.nonceStr, // 必填，生成签名的随机串
                        signature: data.signature,// 必填，签名
                        jsApiList: [
                            'updateAppMessageShareData',
                            'updateTimelineShareData',
                            'onMenuShareWeibo',
                            'onMenuShareQZone',
                        ] // 必填，需要使用的JS接口列表
                    });
                });

                wx.ready(function () {   //需在用户可能点击分享按钮前就先调用
                    wx.updateAppMessageShareData({
                        title: '分享标题', // 分享标题
                        desc: '分享描述', // 分享描述
                        link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                        imgUrl: '', // 分享图标
                        success: function () {
                            // 设置成功
                        }});
                    });
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
            bottomDisplayClose() {
                this.is_close = false;
            },
            share() {

            },
            getData(offset) {
                this.$http.get('/have_a_look/'+offset).then(response => {
                    let bodyContent = response.body;
                    for (let i = 0;i < bodyContent.length;i++) {
                        this.poetry_list.push(bodyContent[i]);
                    }
                });
            },
            audoMenu() {
                this.is_close = true;
                this.poetry_list = [];
                this.getData(0);
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
                    let html = this.updateLrc(interval,lrc_content,'#0a612f');
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
    [v-cloak] {
        display: none;
    }
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
        height: 60px;
        line-height: 40px;
        text-align: center;
        overflow: hidden;
        padding-top: 20px;
        font-size: 23px;
        color: #0a612f;
    }
    #content-detail {
        width: 100%;
        text-align: center;
        font-size: 16px;
        margin-top: 60px;
    }
    .bottom-display {
        width: 100%;
        height: 60%;
        background-color: #ebebeb;
        position: absolute;
        z-index: 2;
        bottom: 0;
        background: rgba(0,0,0,0.8);
        /*opacity:0.5;
        filter:Alpha(opacity=50);*/ /* IE8 以及更早的浏览器 */
    }
    .bottom-content {
        width: 100%;
        height: 70%;
        float: left;
        position: absolute;
    }
    .bottom-content li {
        width: 90%;
        height: 40px;
        line-height: 40px;
        margin-left: 5%;
        margin-top: 10px;
        color: #f8f8f8;
        font-size: 20px;
        list-style-type: none;
        border-bottom: 1px solid #3b3b3b;
    }
    .bottom-content .bottom-load {
        color: #f8f8f8;
        font-size: 20px;
        position: absolute;
        left: 50%;
        transform: translate(-50%, 50%);
    }
    .bottom-display-close {
        position: absolute;
        width: 90%;
        height: 50px;
        line-height: 50px;
        float: left;
        bottom: 10px;
        background-color: #f8f8f8;
        margin-left: 5%;
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
    }
    .bottom-index {
        color: #00b3ee;
        font-size: 30px;
        font-style: italic;
        margin-right: 20px;
    }
    .audio-box {
        width: 100%;
        height: 100%;
        left: 0;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        background-position: center 0;
        color: #2b2b2b;
    }
    .audio-container{
        width: 100%;
        position: absolute;
        bottom: 120px;
    }
    .audio-view{
        width: 100%;
        height: 80px;
    }
    .audio-body{
        width: 100%;
        height: 100%;
        padding-left: 5%;
        padding-right: 5%;
        float: left;
    }
    .audio-title{
        width: 100%;
        height: 30px;
        line-height: 30px;
        color: #000000;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .audio-backs{
        width: 100%;
        height: 50px;
    }
    .audio-time {
        width: 100%;
        height: 30px;
        margin-top: 20px;
        float: left;
        color: #000000;
        font-size: 20px;
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
        height: 1px;
        border-radius: 3px;
        background-color: #676060;
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
        background-color: #37da5a;
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
        background-color: #37da5a;
        border-radius: 50%;
        cursor: pointer;
    }
    .audio-btn{
        float: left;
        width: 100%;
        height: 25px;
        line-height: 25px;
        font-size: 25px;
    }
    .audio-select{
        height: 39px;
        margin-top: 25px;
        width: 280px;
        margin-left: auto;
        margin-right: auto;
    }
    .audio-select > div{
        width: 39px;
        height: 39px;
        background-size: 100% 100%;
        background-position: center center;
        background-repeat: no-repeat;
        float: left;
        cursor: pointer;
    }
    .audio-select > div + div{
        cursor: pointer;
        margin-left: 80px;
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