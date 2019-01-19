<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>K</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">图书小程序管理系统</span>
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
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- 菜单中的开关按钮 -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{@asset("/admin-lte/dist/img/user2-160x160.jpg")}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">管理员</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- 菜单中的用户头像 -->
                        <li class="user-header">
                            <img src="{{@asset("/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">

                            <p>
                                史明哲 - 管理员
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
                            </div>
                            <div class="pull-right">
                                <a href="{{@url("/outer/loginOut")}}" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>