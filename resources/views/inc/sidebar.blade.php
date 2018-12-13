<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
      <img src="{!! asset('public/admin/images/img.jpg') !!}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>Admin</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Menu</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('admin/home') }}"><i class="fa fa-home"></i> Bảng điều khiển</a>
        </li>
        <li class="{{ request()->is('admin/question/*') ? 'active' : '' }}"><a><i class="fa fa-edit"></i> Quản lý câu hỏi <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{ request()->is('admin/question/*') ? 'display: block;' : '' }}">
            <li><a href="{{ url('admin/group') }}">Bộ câu hỏi</a></li>
            <li class="{{ request()->is('admin/question/*') ? 'current-page' : '' }}"><a href="{{ url('admin/question') }}">Câu hỏi</a></li>
          </ul>
        </li>
        <li class="{{ request()->is('admin/test/*') ? 'active' : '' }}"><a><i class="fa fa-align-right"></i> Quản lý đề thi <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="{{ request()->is('admin/test/*') ? 'display: block;' : '' }}">
            <li><a href="{{url('admin/topic')}}">Bộ đề thi</a></li>
            <li class="{{ request()->is('admin/test/*') ? 'current-page' : '' }}"><a href="{{url('admin/test')}}">Đề thi</a></li>
            <li><a href="{{url('admin/list-test-disable')}}">Danh sách đề thi đã khóa</a></li>
            <li><a href="#">Trắc nghiệm năng lực</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-user"></i> Quản lý học sinh <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">--</a></li>
            <li><a href="#">--</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Thống kê báo cáo <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">--</a></li>
            <li><a href="#">--</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-envelope"></i> Phản hồi </a>
        </li>
        <li><a><i class="fa fa-cog"></i> Cài đặt </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
