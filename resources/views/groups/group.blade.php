@extends('layouts.admin')
@section('title', 'Quản lý bộ câu hỏi')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm bộ câu hỏi <small>Add new group questions</small></h2>
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
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                    action="{{url('admin/group')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Tên bộ câu hỏi <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="group_name" name="group_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class">Lớp <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <select name="class" id="class" class="form-control" required>
                                <option value="10">Lớp 10</option>
                                <option value="11">Lớp 11</option>
                                <option value="12">Lớp 12</option>
                                <option value="dh">Đại học</option>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Nhập lại</button>
                            <button type="submit" class="btn btn-success">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách bộ câu hỏi<small>List of group questions</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="group_name">Lựa chọn lớp <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <select name="class_group" id="class_group" class="form-control" required>
                                <option value="10">Lớp 10</option>
                                <option value="11">Lớp 11</option>
                                <option value="12">Lớp 12</option>
                                <option value="dh">Đại học</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="button" id="show_list_group" class="btn btn-success" value="Hiển thị">
                        </div>
                    </div>
                </form>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                </p>
                <div id="list_group">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                        cellspacing="0" width="100%">
                        @if(count($groups) > 0)
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Tên bộ câu hỏi</th>
                                <th>Ngày thêm</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->group_name}}</td>
                                <td>{{$group->created_at}}</td>
                                <td><span class="edit_group_question detail-pointer" data-id="{{$group->id}}" data-group_name="{{$group->group_name}}"
                                        data-class="{{$group->class}}"><span class="glyphicon glyphicon-edit"></span> Sửa</span>
                                    | <span class="delete_group detail-pointer" data-id="{{$group->id}}" onclick="return confirm('Xóa bộ câu hỏi sẽ xóa tất cả câu hỏi có trong bộ, xác nhận xóa?')"><span class="glyphicon glyphicon-trash"></span> Xóa</span></td>
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
<div class="clearfix"></div>
<br />

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="fid">#ID:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="fclass">Lớp:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="fclass" required>
                                <option value="10">Lớp 10</option>
                                <option value="11">Lớp 11</option>
                                <option value="12">Lớp 12</option>
                                <option value="dh">Đại học</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="fgroup_name">Tên bộ câu hỏi:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fgroup_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class='glyphicon'> </span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection