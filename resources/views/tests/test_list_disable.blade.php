@extends('layouts.admin')
@section('title', 'Danh sách đề thi đã khóa')
@section('content')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách đề thi đã khóa<small>List of test exam disabled</small></h2>
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
            <br />
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                </p>
                <div id="list_group">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                    cellspacing="0" width="100%">
                        @if(count($tests) > 0)
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Tên đề thi</th>
                                <th>Câu hỏi/ Thời gian</th>
                                <th>Loại đề</th>
                                <th>Mã đề</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tests as $test)
                            <tr>
                                <td>{{$test->id}}</td>
                                <td>{{$test->test_name}}</td>
                                <td>{{$test->number_question}} / {{$test->time_limit}}</td>
                                @if($test->is_required == 1) <td>Ôn tập</td>
                                @else <td>Thi</td>
                                @endif
                                <td>{{$test->secret_key}}</td>
                                <td><span class="test-des detail-pointer" data-test_name="{{$test->test_name}}" data-note="{{$test->note}}"
                                data-is_required="{{$test->is_required}}" data-secret_key="{{$test->secret_key}}" data-created_at="{{$test->created_at}}">Chi tiết
                                {{-- | <span class="enable_test detail-pointer" data-id="{{$test->id}}" data-status="1" onclick="return confirm('Mở khóa đề thi?')">Mở khóa</span>     --}}
                                | <a href="{{url("admin/test/disable/$test->id/1")}}" onclick="return confirm('Mở khóa đề thi?')">Mở khóa</a>    
                                | <span lass="delete_test detail-pointer" data-id="{{$test->id}}" onclick="return confirm('Xóa đề thi này, xác nhận xóa?')">Xóa</span></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>Không có thông tin để hiển thị</tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Des info -->
<div id="desModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin chi tiết</h4>
                </div>
                <div class="modal-body">
                    <p id="des-content">Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
    
        </div>
    </div>
@stop