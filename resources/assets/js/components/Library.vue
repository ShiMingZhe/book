<template>
   <div id="container" ref="poetry_content">
      <div v-if="is_list" class="content-item">
         <div v-for="content in contents" v-if="content.is_available == 1" id="item" @click="goTo(content.detail)">
            <div id="content_left">
               <div id="introduce_top">
                  <span id="title">{{ content.title }}</span>
                  <span id="author">{{content.author}}</span>
               </div>
               <div id="introduce_bottom">{{ content.short_introduce }}</div>
            </div>
         </div>
      </div>
      <div v-if="is_detail">
         <div class="back" @click="goPrevious">返回</div>
         <div class="detail">
            <div v-html="detail"></div>
         </div>
      </div>
   </div>
</template>

<script>
    export default {
        name: "Library",
        data() {
            return {
                contents:[],
                detail:'',
                is_list:true,
                is_detail:false,
                offset:0,
            }
        },
        async mounted() {
            this.$http.get('/have_a_look/0').then(response => {
                this.contents = response.body;
            });
            window.addEventListener('scroll',this.loadMore,true);
        },
        destroyed(){
            window.removeEventListener('scroll',this.loadMore,true)
        },
        methods: {
            goTo(detail) {
                this.is_list = false;
                this.is_detail = true;
                this.detail = detail;
            },
            goPrevious() {
                this.is_list = true;
                this.is_detail = false;
            },
            getData(offset) {
                this.$http.get('/have_a_look/'+offset).then(response => {
                    let bodyContent = response.body;
                    for (let i = 0;i < bodyContent.length;i++) {
                        this.contents.push(bodyContent[i]);
                    }
                });
            },
            loadMore() {
                clearTimeout(this.timer);
                this.timer = setTimeout(()=> {
                    let {clientHeight, scrollHeight} = this.$refs.poetry_content;
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop ||
                        document.body.scrollTop;
                    if (scrollTop + clientHeight +20 > scrollHeight) {
                        this.offset += 10;
                        this.getData(this.offset);
                    }
                },13);
            },
        }
    }
</script>

<style scoped>
   #container {
      background-color: #ebebeb;
      padding-top: 10px;
   }
   #item {
      width: 95%;
      height: 60px;
      margin-left: auto;
      margin-right: auto;
      border-radius: 5px;
      background-color: #ffffff;
      margin-top: 10px;
   }
   #content_left {
      width: 90%;
      height: 50px;
      padding-top: 6px;
      padding-left: 10px;
      float: left;
   }
   #introduce_top {
      font-size: 15px;
   }
   #title {
      font-size: 20px;
   }
   #author {
      font-size: 15px;
      margin-left: 10px;
      color: #585858;
   }
   #introduce_bottom {
      color: #b5b5b5;
      margin-top: 2px;
   }
   .back {
      width: 40px;
      height: 26px;
      line-height: 26px;
      background-color: #ffffff;
      text-align: center;
      margin-left: 20px;
      float: right;
      border-radius: 8px;
      margin-right: 10px;
      font-size: 12px;
   }
   .detail {
      color: #ffffff;
      padding-bottom: 70px;
   }
   .content-item {
      padding-bottom: 70px;
   }
</style>