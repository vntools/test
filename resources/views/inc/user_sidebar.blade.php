<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
      <img src="{!! asset('public/admin/images/user_1.png') !!}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Menu</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a><i class="fa fa-edit"></i> Thi thử <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('topic/10') }}">Lớp 10</a></li>
            <li><a href="{{ url('topic/11') }}">Lớp 11</a></li>
            <li><a href="{{ url('topic/12') }}">Lớp 12</a></li>
            <li><a href="{{ url('topic/dh') }}">Thi thử đại học</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-pencil"></i> Thi </span></a>
        </li>
        <li><a><i class="fa fa-align-right"></i> Lịch sử thi </span></a>
        </li>
        <li><a><i class="fa fa-user"></i> Ôn tập kiến thức </span></a>
        </li>
        <li><a><i class="fa fa-table"></i> Diễn đàn </span></a>

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
