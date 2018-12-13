@extends('layouts.admin')
@section('title', 'Chỉnh sửa câu hỏi')
@section('content')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chỉnh sửa câu hỏi<small>Edit question</small></h2>
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
            <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('admin/question/edit-question')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$question->id}}">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Lựa chọn lớp <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select name="question_class" id="question_class" class="form-control" required data-url={{url('admin/group/get-list')}}>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                            <option value="dh">Đại học</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Lựa chọn bộ câu hỏi <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <select name="group_id" id="group_id" class="form-control" required>
                            @if(count($groups) > 0)
                            @foreach($groups as $group)
                            <option value='{{$group->id}}'>{{$group->group_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level">Mức độ<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select class="form-control" name="level">
                            <option value="1">Dễ</option>
                            <option value="2">Trung bình</option>
                            <option value="3">Khó</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="problem">Đề bài<span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                    <textarea name="problem" required class="ckeditor">{{$question->problem}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="answer1">Đáp án 1<span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <textarea name="answer1" required class="ckeditor">{{$question->answer1}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="answer2">Đáp án 2<span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <textarea name="answer2" required class="ckeditor">{{$question->answer2}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="answer3">Đáp án 3
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <textarea name="answer3" class="ckeditor">{{$question->answer3}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="answer4">Đáp án 4
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <textarea name="answer4" class="ckeditor">{{$question->answer4}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="explain">Đáp án đúng<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <select class="form-control" name="correct" required>
                            <option value="a">Đáp án 1</option>
                            <option value="b">Đáp án 2</option>
                            <option value="c">Đáp án 3</option>
                            <option value="d">Đáp án 4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="explain">Lời giải
                    </label>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                        <textarea name="explain" class="ckeditor">{{$question->explain}}</textarea>
                    </div>
                </div>
                {{-- <script>
                    var options = {
                          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                        };
                </script> --}}

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{url('admin/question')}}"><button class="btn btn-primary" type="button">Hủy bỏ</button></a>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection