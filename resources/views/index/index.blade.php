<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>木客网—图书知识付费智能硬件</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{@asset('images/website/favicon.ico')}}"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{@asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Slick slider -->
    <link href="{{@asset('css/website/slick.css')}}" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="{{@asset('css/website/theme-color/default-theme.css')}}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{@asset('css/website/style.css')}}" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<!-- Start Header -->
<header id="mu-header" class="" role="banner">
    <div class="container">
        <nav class="navbar navbar-default mu-navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Text Logo -->
                    <a class="navbar-brand" href="index.html"><i class="fa fa-book" aria-hidden="true"></i> 木客网 MUKE</a>

                    <!-- Image Logo -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav mu-menu navbar-right">
                        <li><a href="#">首页</a></li>
                        <li><a href="#mu-book-overview">资料中心</a></li>
                        <li><a href="#mu-author">硬件设备</a></li>
                        <li><a href="#mu-pricing">互联网产品</a></li>
                        <li><a href="#mu-testimonials">图书产品</a></li>
                        <li><a href="#mu-contact">知识付费</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- Start Featured Slider -->

<section id="mu-hero">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6 col-sm-push-6">
                <div class="mu-hero-right">
                    <img src="{{@asset('images/website/ebook.png')}}" alt="Ebook img">
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-sm-pull-6">
                <div class="mu-hero-left">
                    <h1>深度学习古诗词</h1>
                    <p>诗词学习是小学语文学习的重要内容。为培养小学生的古诗词阅读赏析能力，
                        本书精选了113首吉诗词，分两个阶段进行深度解读:基础阶段75首，进阶阶段38首。
                        每首诗都配有精美的插图和诗词创作背景介绍、生字词注释，现代译文、精简赏析
                        以及与该苫诗相关的小知识。诗人小传等，拓展了学生的知识面。另外，为培养小
                        学生的横向思维能力，扩大小学生古诗词的储备量，还增加了相似诗歌的内容:每
                        诗码，扫码听读，是一本有声读物:随书赠送226首古许词口袋书，方便学生随时学
                        习，查阅。</p>
                    <a href="#" class="mu-primary-btn">立马购买</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Start Featured Slider -->

<!-- Start main content -->

<main role="main">

    <!-- Start Counter -->
    <section id="mu-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-counter-area">

                        <div class="mu-counter-block">
                            <div class="row">

                                <!-- Start Single Counter -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                        <div class="counter-value" data-count="240">0</div>
                                        <h5 class="mu-counter-name">图书</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        <div class="counter-value" data-count="113">0</div>
                                        <h5 class="mu-counter-name">文档</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <div class="counter-value" data-count="1055">0</div>
                                        <h5 class="mu-counter-name">服务人数</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-trophy" aria-hidden="true"></i>
                                        <div class="counter-value" data-count="10000">0</div>
                                        <h5 class="mu-counter-name">浏览次数</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counter -->

    <!-- Start Book Overview -->
    <section id="mu-book-overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-book-overview-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">资料中心</h2>
                            <span class="mu-header-dot"></span>
                            <p>中小学各学科的学习资料，教育部规定的中小学生必读的社科类电子图书</p>
                        </div>

                        <!-- Start Book Overview Content -->
                        <div class="mu-book-overview-content">
                            <div class="row">

                                <!-- Book Overview Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-list" aria-hidden="true"></i>
											</span>
                                        <h4>语文</h4>
                                        <p>中小学生学习必备的语文试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-percent" aria-hidden="true"></i>
											</span>
                                        <h4>数学</h4>
                                        <p>中小学生学习必备的数学试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-language" aria-hidden="true"></i>
											</span>
                                        <h4>英语</h4>
                                        <p>中小学生学习必备的英语试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-balance-scale" aria-hidden="true"></i>
											</span>
                                        <h4>物理</h4>
                                        <p>中学生学习必备的物理试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- Book Overview Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="	fa fa-flask" aria-hidden="true"></i>
											</span>
                                        <h4>化学</h4>
                                        <p>中学生学习必备的化学试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-tree" aria-hidden="true"></i>
											</span>
                                        <h4>生物</h4>
                                        <p>中学生学习必备的生物试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-file-text" aria-hidden="true"></i>
											</span>
                                        <h4>政治</h4>
                                        <p>中学生学习必备的政治试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-map" aria-hidden="true"></i>
											</span>
                                        <h4>历史</h4>
                                        <p>中学生学习必备的历史试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-globe" aria-hidden="true"></i>
											</span>
                                        <h4>地理</h4>
                                        <p>中学生学习必备的地理试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-filter" aria-hidden="true"></i>
											</span>
                                        <h4>理综</h4>
                                        <p>中学生学习必备的理综试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-files-o" aria-hidden="true"></i>
											</span>
                                        <h4>文综</h4>
                                        <p>中学生学习必备的文综试题、课件等电子资料</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-book" aria-hidden="true"></i>
											</span>
                                        <h4>名著</h4>
                                        <p>提供各种名著、阅读理解各类优质教学资源</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->


                            </div>
                        </div>
                        <!-- End Book Overview Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Book Overview -->


    <!-- Start Author -->
    <section id="mu-author">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-author-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">硬件设备</h2>
                            <span class="mu-header-dot"></span>
                        </div>

                        <!-- Start Author Content -->
                        <div class="mu-author-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mu-author-image">
                                        <img src="{{@asset('images/website/author.jpg')}}" alt="Author Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mu-author-info">
                                        <h3>新知识付费系统</h3>
                                        <p>知识付费的本质，在于把知识变成产品或服务，以实现商业价值。知识付费有利于人们高效筛选信息，
                                            付费的同时也激励优质内容的生产简而言之，知识付费是让知识的接受者付出相应的成本。</p>

                                        <p> 知识付费目前主要指知识的接收者为所阅览知识付出资金的现象。知识付费让知识的获得者间接为向
                                            知识的传播者与筛选者给予报酬，而不是让参与知识传播链条的人通过流量或广告等其他方式获得收益。</p>
                                        <img class="mu-author-sign" src="{{@asset('images/website/author-signature.png')}}" alt="Author Signature">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Author Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Author -->

    <!-- Start Pricing -->
    <section id="mu-pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-pricing-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">互联网产品</h2>
                            <span class="mu-header-dot"></span>
                            <p>题库，图库，文库三大类互联网产品，各种资源，提供原创精品的学习资源</p>
                        </div>

                        <!-- Start Pricing Content -->
                        <div class="mu-pricing-content">
                            <div class="row">

                                <!-- Pricing Single Content -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="mu-pricing-single">

                                        <div class="mu-pricing-single-head">
                                            <h4>题库</h4>
                                            <p class="mu-price-tag">
                                                <span>@</span> 题
                                            </p>
                                        </div>

                                        <ul class="mu-price-feature">
                                            <li> 2018年高考语文真题（全国卷）</li>
                                            <li> 2018年高考语文真题（北京卷） </li>
                                            <li> 2018年高考语文真题（上海卷） </li>
                                            <li> 2018年高考语文真题（天津卷） </li>
                                        </ul>

                                        <div class="mu-pricing-single-footer">
                                            <a href="#" class="mu-order-btn">立即访问</a>
                                        </div>

                                    </div>
                                </div>
                                <!-- / Pricing Single Content -->

                                <!-- Pricing Single Content -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="mu-pricing-single mu-popular-price-tag">


                                        <div class="mu-pricing-single-head">
                                            <h4>文库</h4>
                                            <p class="mu-price-tag">
                                                <span>@</span> 文
                                            </p>
                                        </div>

                                        <ul class="mu-price-feature">
                                            <li> 《红楼梦》诗词全集 </li>
                                            <li> 《了不起的盖茨比》英文版</li>
                                            <li> 《假如给我三天光明》英文版 </li>
                                            <li> 《尼尔斯骑鹅旅行记》 </li>
                                        </ul>

                                        <div class="mu-pricing-single-footer">
                                            <a href="#" class="mu-order-btn">立即访问</a>
                                        </div>


                                    </div>
                                </div>
                                <!-- / Pricing Single Content -->

                                <!-- Pricing Single Content -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="mu-pricing-single">


                                        <div class="mu-pricing-single-head">
                                            <h4>图库</h4>
                                            <p class="mu-price-tag">
                                                <span>@</span> 图
                                            </p>
                                        </div>

                                        <ul class="mu-price-feature">
                                            <li> 野蛮人大作战系列 </li>
                                            <li> QQ飞车原画设计 </li>
                                            <li> 皇室战争-高校邀请赛KV&赛事LOGO </li>
                                            <li> 乐事薯片#粉上樱花这一刻#插画海报 </li>
                                        </ul>

                                        <div class="mu-pricing-single-footer">
                                            <a href="#" class="mu-order-btn">立即访问</a>
                                        </div>


                                    </div>
                                </div>
                                <!-- / Pricing Single Content -->


                            </div>
                        </div>
                        <!-- End Pricing Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing -->

    <!-- Start Testimonials -->
    <section id="mu-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-testimonials-area">
                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">图书产品</h2>
                            <span class="mu-header-dot"></span>
                        </div>

                        <div class="mu-testimonials-block">
                            <ul class="mu-testimonial-slide">

                                <li>
                                    <p>深度学习古诗词，回归诗教传统，读懂每一首诗；一诗一码，一本可以听的书；75首新课标推荐诗词，38首进阶诗词；
                                        深度解读113首诗，38首进阶诗词，附录故事19首</p>
                                    <img class="mu-rt-img" src="{{@asset('images/website/reader-1.png')}}" alt="img">
                                    <h5 class="mu-rt-name"> 深度学习古诗词</h5>
                                    <span class="mu-rt-title">小学生背诵诗词75+38首</span>
                                </li>

                                <li>
                                    <p>古诗词里的科学与故事，16首咏物诗词注释翻译，16个科学问题等你解答，16个小故事等你聆听，
                                        培养孩子的文学素养与科学兴趣</p>
                                    <img class="mu-rt-img" src="{{@asset('images/website/reader-2.png')}}" alt="img">
                                    <h5 class="mu-rt-name"> 古诗词里的科学与故事</h5>
                                    <span class="mu-rt-title">跟妈妈一起读诗词 学科学 听故事</span>
                                </li>

                                <li>
                                    <p>小学各年级语文学习资料全面大汇编，适合各个年级的小学生学习查询，融会贯通，知识迁移，总体提供，
                                        厚积薄发，举一反三，知识量提升学习力</p>
                                    <img class="mu-rt-img" src="{{@asset('images/website/reader-3.png')}}" alt="img">
                                    <h5 class="mu-rt-name"> 进阶学习</h5>
                                    <span class="mu-rt-title">小学语文资料库</span>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials -->


    <!-- Start knowledge -->
    <section id="mu-knowledge">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-knowledge-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">知识付费</h2>
                            <span class="mu-header-dot"></span>
                            <p>有声读物,有声书,中小学语文英语,随时随地,听我想听。</p>
                        </div>

                        <!-- Start Book Overview Content -->
                        <div class="mu-book-overview-content">
                            <div class="row">

                                <!-- Book Overview Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-1.png')}}" alt="img">
											</span>
                                        <h4>《诗经》中的文学美</h4>
                                        <p>那些一读就令人着迷的句子，那些醉人的故事</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->


                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-3.png')}}" alt="img">
											</span>
                                        <h4>《红楼梦》诗词赏析</h4>
                                        <p>不仅仅是一部经典的小说，书中的诗词也堪称经典</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-2.png')}}" alt="img">
											</span>
                                        <h4>《楚辞》深度学习</h4>
                                        <p>我国浪漫主义诗歌的开端，对李白等后世诗人有很大的影响</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
											<img class="zhishi-img" src="{{@asset('images/website/zhishi-4.png')}}" alt="img">
											</span>
                                        <h4>《西游记》名家点评</h4>
                                        <p>神魔小说的经典之作，看看名家是怎么来点评的吧</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- Book Overview Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-5.png')}}" alt="img">
											</span>
                                        <h4>《论语》深度解读</h4>
                                        <p>儒家学派的经典著作，影响中国文学数千年</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-6.png')}}" alt="img">
											</span>
                                        <h4>《孟子》深度阅读</h4>
                                        <p>充满辩论推理，语言雄浑有力，非常具有说服力。</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->
                                <!-- Book Overview Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-7.png')}}" alt="img">
											</span>
                                        <h4>《三国演义》名家评点</h4>
                                        <p>军事历史小说，人物形象鲜明，战争场面众多，时间跨度长</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                                <!-- About Us Single Content -->
                                <div class="col-md-3 col-sm-6">
                                    <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-8
												.png')}}" alt="img">
											</span>
                                        <h4>《水浒传》点评</h4>
                                        <p>塑造了许多典型形象，故事情节波折，需要辩证去读</p>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->

                            </div>
                        </div>
                        <!-- End Book Overview Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->


</main>

<!-- End main content -->


<!-- Start footer -->
<footer id="mu-footer" role="contentinfo">
    <div class="container">
        <div class="mu-footer-area">
            <p class="mu-copyright">&copy; Copyright <a href="#" target="_blank" title="木客网">木客网</a> </p>
            <p class="mu-copyright">备案号: <a href="#" target="_blank" title="木客网">京ICP备16029267号-1</a> </p>
        </div>
    </div>

</footer>
<!-- End footer -->



<!-- jQuery library -->
<script src="{{@asset('js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{@asset('js/bootstrap.min.js')}}"></script>
<!-- Slick slider -->
<script type="text/javascript" src="{{@asset('js/website/slick.min.js')}}"></script>
<!-- Counter js -->
<script type="text/javascript" src="{{@asset('js/website/counter.js')}}"></script>
<!-- Ajax contact form  -->
<script type="text/javascript" src="{{@asset('js/website/app.js')}}"></script>



<!-- Custom js -->
<script type="text/javascript" src="{{@asset('js/website/custom.js')}}"></script>


</body>
</html>