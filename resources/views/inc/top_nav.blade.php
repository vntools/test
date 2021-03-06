<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="{!! asset('public/admin/images/img.jpg') !!}" alt="">Admin
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Cài đặt</span>
                </a>
              </li>
              <li><a href="javascript:;">Trợ giúp</a></li>
            <li><a href="{{url('/admin-logout')}}"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
            </ul>
          </li>
          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-green">6</span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <li>
                <a>
                  <span class="image"><img src="{!! asset('public/admin/images/img.jpg') !!}" alt="Profile Image" /></span>
                  <span>
                    <span>Anh Quân</span>
                    <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
                    Thầy cô cho em hỏi...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="{!! asset('public/admin/images/img.jpg') !!}" alt="Profile Image" /></span>
                  <span>
                    <span>Hồng Thư</span>
                    <span class="time">7 mins ago</span>
                  </span>
                  <span class="message">
                    Em muốn hỏi bài này...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="{!! asset('public/admin/images/img.jpg') !!}" alt="Profile Image" /></span>
                  <span>
                    <span>Đức trí</span>
                    <span class="time">8 mins ago</span>
                  </span>
                  <span class="message">
                    Em chào thầy cô ạ...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="{!! asset('public/admin/images/img.jpg') !!}" alt="Profile Image" /></span>
                  <span>
                    <span>Hoàng Quyên</span>
                    <span class="time">18 mins ago</span>
                  </span>
                  <span class="message">
                    Hello...
                  </span>
                </a>
              </li>
              <li> 
                <div class="text-center">
                  <a>
                    <strong>Xem tất cả</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->
