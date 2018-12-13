@extends('layouts.admin')
@section('title', 'Quản lý câu hỏi')
@section('content')
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách câu hỏi<small>List of questions</small></h2>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Lựa chọn bộ câu hỏi <span class="required">*</span>
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
                    <div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                        <input type="button" id="show_list_question" class="btn btn-success" value="Hiển thị">
                        <a href="{{url('admin/question/add')}}"><button type="button" class="btn btn-warning"> >> Thêm câu hỏi mới</button></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <div id="list_question">
            </div>
        </div>
    </div>



    {{-- <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách câu hỏi<small>List questions</small></h2>
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
            <p class="text-muted font-13 m-b-30">
                Câu hỏi mới <a href="{{url('admin/question/add')}}"><b>Thêm</b></a>
            </p>

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th># ID</th>
                        <th>Câu hỏi</th>
                        <th>Độ khó</th>
                        <th>Ngày thêm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($questions) > 0)
                    @foreach($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{!! $question->problem !!}</span></td>
                        @if($question->level == "1")
                        <td>Dễ</td>
                        @elseif($question->level == "2")
                        <td>Trung bình</td>
                        @elseif($question->level == "3")
                        <td>Khó</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>{{$question->created_at}}</td>
                        <td><span class="question-des" data-problem="{{$question->problem}}" data-answer1="{{$question->answer1}}"
                                data-answer2="{{$question->answer2}}" data-answer3="{{$question->answer3}}"
                                data-answer4="{{$question->answer4}}" data-correct="{{$question->correct}}"
                                data-explain="{{$question->explain}}" data-level="{{$question->level}}" data-group_name="{{$question->group_name}}"
                                data-created_at="{{$question->created_at}}">Chi tiết</span>
                            |<a href="{{url("admin/question/edit/$question->id")}}"> Sửa |
                                <a href="{{url("admin/question/delete/$question->id")}}" onclick="return confirm('Bạn có chắc chắn muốn xóa câu hỏi này không?')">Xóa</a></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>Không có thông tin để hiển thị</tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div> --}}
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