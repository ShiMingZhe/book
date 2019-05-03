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
                    <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-book" aria-hidden="true"></i> 木客网 MUKE</a>

                    <!-- Image Logo -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav mu-menu navbar-right">
                        <li><a href="{{url('/')}}">首页</a></li>
                        <li><a href="{{url('/')}}">资料中心</a></li>
                        <li><a href="{{url('/')}}">硬件设备</a></li>
                        <li><a href="{{url('/')}}">互联网产品</a></li>
                        <li><a href="{{url('/')}}">图书产品</a></li>
                        <li><a href="{{url('/')}}">知识付费</a></li>
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
                    <a href="{{url('/knowledge')}}" rel="stylesheet">
                        <div class="mu-book-overview-single">
											<span class="mu-knowledge-overview-icon-box">
												<img class="zhishi-img" src="{{@asset('images/website/zhishi-1.png')}}" alt="img">
											</span>
                            <h4>《诗经》中的文学美</h4>
                            <p>那些一读就令人着迷的句子，那些醉人的故事</p>
                        </div>
                    </a>
                </div>
                <!-- / Book Overview Single Content -->


                <!-- About Us Single Content -->
                <div class="col-md-3 col-sm-6">
                    <div class="mu-book-overview-single">
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
											<span class="mu-knowledge-overview-icon-box">
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
    </div>
</section>

<!-- Start Featured Slider -->

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