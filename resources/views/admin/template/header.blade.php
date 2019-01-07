<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>K</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">木客网管理后台</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">{{$taskNum}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">你有{{$taskNum}}个任务待完成</li>
                        <li class="footer">
                            <a href="{{@url("/task/admin/index")}}">查看任务</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- 菜单中的开关按钮 -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{@asset("/admin-lte/dist/img/user2-160x160.jpg")}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{$adminRole}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- 菜单中的用户头像 -->
                        <li class="user-header">
                            <img src="{{@asset("/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">

                            <p>
                                {{$adminName}} - {{$adminRole}}
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#"></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                            </div>
                            <div class="pull-right">
                                <a href="{{@url("/login_out")}}" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>