@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- top tiles -->
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{$totalUser}}</div>
                    <h3>Người dùng</h3>
                    <p>Tổng số học sinh đăng ký trên hệ thống.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{$totalQuestion}}</div>
                    <h3>Câu hỏi</h3>
                    <p>Tổng số câu hỏi trên hệ thống.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-list"></i></div>
                    <div class="count">{{$totalTestPractice}}</div>
                    <h3>Đề tự luyện</h3>
                    <p>Tổng số đề thi tự luyện trên hệ thống.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-question-circle"></i></div>
                    <div class="count">{{$totalTest}}</div>
                    <h3>Đề thi</h3>
                    <p>Tổng số đề thi trên hệ thống.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /top tiles -->

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thống kê truy cập <small>Weekly access</small></h2>
                <div class="filter">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="demo-container" style="height:280px">
                        <div id="chart_plot_02" class="demo-placeholder"></div>
                    </div>
                    <div class="tiles">
                        <div class="col-md-4 tile">
                            <span>Tổng số lượt truy cập</span>
                            <h2>3,809</h2>
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                        <div class="col-md-4 tile">
                            <span>Lượt truy cập hôm nay</span>
                            <h2>98</h2>
                            <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                        <div class="col-md-4 tile">
                            <span>Lượt truy cập tuần này</span>
                            <h2>709</h2>
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div>
                        <div class="x_title">
                            <h2>Top học sinh</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Nguyễn Văn A</a>
                                    <p>Hoàn thành <strong>6</strong> bài thi</p>
                                    <p>Tỷ lệ đúng / sai: <strong>77%</strong></p>
                                </div>
                            </li>
                            <li class="media event">
                                <a class="pull-left border-green profile_thumb">
                                    <i class="fa fa-user green"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Nguyễn Thị B</a>
                                    <p>Hoàn thành <strong>3</strong> bài thi</p>
                                    <p>Tỷ lệ đúng / sai: <strong>75%</strong></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý câu hỏi <small>Question </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-ok"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Quản lý câu hỏi</a>
                        <p>Quản lý câu hỏi</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-th-list"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Thêm bộ câu hỏi</a>
                        <p>Thêm mới bộ câu hỏi vào hệ thống</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-plus"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Thêm câu hỏi</a>
                        <p>Thêm mới câu hỏi vào hệ thống</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý đề thi <small>Test exam</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-ok"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Quản lý đề thi</a>
                        <p>Quản lý đề thi</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-th-list"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Thêm bộ đề thi</a>
                        <p>Thêm mới bộ đề thi vào hệ thống</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-plus"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Tạo đề thi</a>
                        <p>Tạo đề thi mới trên hệ thống</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý học sinh <small>Students</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-user"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Quản lý học sinh</a>
                        <p>Quản lý học sinh</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-th-list"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Truy vấn học sinh</a>
                        <p>Truy vấn thông tin chi tiết</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="day"><span class="glyphicon glyphicon-stats"></span></p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Thống kê</a>
                        <p>Thống kê học sinh</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>
{{-- <div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Quản lý câu hỏi</div>
                    <div class="panel-body">
                        <a href="">
                            <h4>Quản lý bộ câu hỏi</h4>
                        </a>
                        <a href="">
                            <h4>Thêm bộ câu hỏi mới</h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Quản lý câu hỏi</div>
                    <div class="panel-body">Quản lý đề thi</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">Quản lý câu hỏi</div>
                    <div class="panel-body">Quản lý đề thi</div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@stop