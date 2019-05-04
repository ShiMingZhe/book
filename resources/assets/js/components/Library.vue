<template>
   <div id="container" ref="poetry_content">
      <div v-if="is_list" class="content-item">
         <div class="logo"></div>
         <div class="col-sm-12 search">
            <div class="input-group">
               <input type="text" class="form-control search-input" placeholder="请输入标题名或作者名" ref="search">
               <span class="input-group-btn">
                 <button class="btn btn-default search-button" type="button" @click="search">搜一下</button>
               </span>
            </div>
         </div>
         <div class="ad">
         </div>
         <div v-for="content in contents" v-if="content.is_available == 1" id="item" @click="goTo(content.detail)">
            <div id="content_left">
               <div id="introduce_top">
                  <span id="title">{{ content.title | ellipsis}}</span>
                  <span id="author">{{content.author}}</span>
               </div>
               <div id="introduce_bottom">{{ content.short_introduce }}</div>
            </div>
         </div>
      </div>
      <div v-if="is_detail">
         <div class="back" @click="goPrevious"><i class="glyphicon glyphicon-menu-left"></i>返回</div>
         <div class="detail">
            <div v-html="detail"></div>
         </div>
      </div>
   </div>
</template>

<script>
    export default {
        name: "Library",
        filters: {
            ellipsis (value) {
                if (!value) return '';
                if (value.length > 9) {
                    return value.slice(0,9) + '...'
                }
                return value
            }
        },
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
            let url = this.$route.path;
            console.log(url);
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
            search() {
               let keywords = this.$refs.search.value;
               this.$http.get('/search/'+keywords).then(response => {
                   this.contents = [];
                   let bodyContent = response.body;
                   for (let i = 0;i < bodyContent.length;i++) {
                       this.contents.push(bodyContent[i]);
                   }
               });
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
      background-color: #ffffff;
      padding-top: 10px;
   }
   #item {
      width: 95%;
      height: 60px;
      margin-left: auto;
      margin-right: auto;
      border-radius: 5px;
      background-color: #f9f9f9;
      margin-top: 10px;
   }
   #content_left {
      width: 100%;
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
      width: 60px;
      height: 35px;
      line-height: 35px;
      text-align: center;
      margin-left: 80%;
      border-radius: 3px;
      position: fixed;
      border: 1px green dashed;
      font-size: 16px;
   }
   .detail {
      color: #000;
      padding-bottom: 70px;
   }
   .content-item {
      padding-bottom: 70px;
   }
   .search {
      padding-right: 10px;
      padding-left: 10px;
      margin-bottom: 25px;
   }
   .search-input {
      height: 46px;
      border: 1px solid #259c1d;
   }
   .search-button {
      height: 46px;
      border: 1px solid #259c1d;
      color: #f0ad4e;
      font-size: 19px;
   }
   .logo {
      width: 146px;
      height: 60px;
      text-align: center;
      font-size: 32px;
      margin-top: 46px;
      margin-bottom: 27px;
      background: url("../../../../public/webapp/images/logo.png");
      background-size: 100% auto;
      background-repeat: no-repeat;
      margin-left: 33%;
   }
   .ad {
      width: 100%;
      height: 150px;
      background: url("../../../../public/webapp/images/ad.png");
      background-size: 100% auto;
      background-repeat: no-repeat;
   }
</style>