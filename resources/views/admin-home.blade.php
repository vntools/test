@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('content')
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Tổng số người dùng</span>
        <div class="count green">{{$totalUser}}</div>
        <span class="count_bottom"><i class="green">90% </i> Hoạt động tuần này</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Tổng số câu hỏi</span>
    <div class="count">{{$totalQuestion}}</div>
        {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Tổng đề tự luyện</span>
        <div class="count green">2,500</div>
        {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Tổng đề thi</span>
        <div class="count">4,567</div>
        {{-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
</div>
<!-- /top tiles -->
@stop