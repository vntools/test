@extends('layouts.admin')
@section('title', 'Thêm đề thi mới')
@section('content')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm đề thi mới<small>Add new test exam</small></h2>
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
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('admin/test/add')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_class">Lựa chọn lớp <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select name="topic_class" id="topic_class" class="form-control" data-url={{url('admin/topic/get-list')}}
                            required>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                            <option value="dh">Đại học</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_id">Lựa chọn nhóm đề thi <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <select name="topic_id" id="topic_id" class="form-control" required>
                            @if(count($topics) > 0)
                            @foreach($topics as $topic)
                            <option value='{{$topic->id}}'>{{$topic->topic_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_exam">Tên đề thi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <input type="text" id="test_exam" name="test_exam" required="required" class="form-control col-md-6 col-xs-12"
                            placeholder="Kiểm tra chương 1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_question">Số lượng câu hỏi
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select class="form-control" name="number_question">
                            <option value='5'>5 câu</option>
                            <option value='10'>10 câu</option>
                            <option value='15'>15 câu</option>
                            <option value='20'>20 câu</option>
                            <option value='30'>30 câu</option>
                            <option value='45'>45 câu</option>
                            <option value='60'>60 câu</option>
                            <option value='90'>90 câu</option>
                            <option value='120'>120 câu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Dạng đề <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select class="form-control" name="type">
                            <option value='0'>Đề ôn tập</option>
                            <option value='1'>Đề thi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Thời gian <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select class="form-control" name="time">
                            <option value='5'>5 phút</option>
                            <option value='10'>10 phút</option>
                            <option value='15'>15 phút</option>
                            <option value='20'>20 phút</option>
                            <option value='30'>30 phút</option>
                            <option value='45'>45 phút</option>
                            <option value='60'>60 phút</option>
                            <option value='90'>90 phút</option>
                            <option value='120'>120 phút</option>
                            <option value='120'>150 phút</option>
                            <option value='120'>180 phút</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_question">Bộ câu hỏi <span
                            class="required">*</span>
                    </label>
                    <div class="checkbox">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="group_checkbox" data-url={{url('admin/group/get-list')}}>
                                @if(count($groups) > 0)
                                @foreach ($groups as $group)
                                &nbsp;&nbsp;&nbsp;<input type="checkbox" name="group[]" value="{{$group->id}}">
                                {{$group->group_name}}<br />
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Tỷ lệ dễ - trung bình - khó<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="range_min_max" value="" name="rate" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duplicate">Check trùng với đề thi
                        khác<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" class="js-switch" checked name="duplicate">
                    </div>
                </div>
                
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('admin/test')}}"><button class="btn btn-primary" type="button">Hủy bỏ</button></a>
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@stop