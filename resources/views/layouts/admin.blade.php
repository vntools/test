<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.header')
    <title>@yield('title') - Hệ thống thi trắc nghiệm vật lý trực tuyến</title>
    <link rel="shortcut icon" href="{{asset('public/images/academy.png')}}" type="image/x-icon"/>
</head>

<body class="nav-md footer_fixed">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Hi team</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- sidebar menu -->
                    @include('inc.sidebar')
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            @include('inc.top_nav')
            <!-- /top navigation -->
            <div class="right_col" role="main">
                <div class="">
                    <!-- page content -->
                    @include('inc.message')
                    @yield('content')
                    <!-- /page content -->
                </div>
                <div class="clearfix"></div>
                <br/>
              </div>
            <!-- footer content -->
            @include('inc.footer')
        </div>
    </div>
    <!-- js -->
    @include('inc.js')
    <!-- /js -->
</body>

</html>
