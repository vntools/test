@extends('layouts.admin')
@section('title', 'Quản lý đề thi')
@section('content')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách đề thi<small>List of test exam</small></h2>
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
            <form data-parsley-validate class="form-horizontal form-label-left" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_class">Lựa chọn lớp <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select name="topic_class" id="topic_class" class="form-control" data-url={{url('admin/topic/get-list')}} required>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                            <option value="dh">Đại học</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_id">Lựa chọn bộ đề <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <select name="topic_id" id="topic_id" class="form-control" required>
                            <option value="all">Tất cả</option>
                            @if(count($topics) > 0)
                                @foreach($topics as $topic)
                                    <option value='{{$topic->id}}'>{{$topic->topic_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                        <input type="button" id="show_list_test" class="btn btn-success" value="Hiển thị">
                        <a href="{{url('admin/test/add')}}"><button type="button" class="btn btn-warning"> >> Tạo đề thi mới</button></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <div id="list_test">
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
<div class="clearfix"></div>
<br />
@endsection