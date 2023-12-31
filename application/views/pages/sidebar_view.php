<div class="sidebar-panel">
  <div class="brand">
    <!-- toggle offscreen menu -->
    <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up">
      <i class="material-icons">menu</i>
    </a>
    <!-- /toggle offscreen menu -->
    <!-- logo -->
    <a class="brand-logo">
      <img class="expanding-hidden" src="http://localhost:8080/trasua//milestone/images/logo.png" alt="">
    </a>
    <!-- /logo -->
  </div>
  <div class="nav-profile dropdown">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <div class="user-image">
        <img src="http://localhost:8080/trasua//milestone/images/avatar.jpg" class="avatar img-circle" alt="user" title="user">
      </div>
      <div class="user-info expanding-hidden">
        Betty Simmons
        <small class="bold">Administrator</small>
      </div>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="javascript:;">Settings</a>
      <a class="dropdown-item" href="javascript:;">Upgrade</a>
      <a class="dropdown-item" href="javascript:;">
        <span>Notifications</span>
        <span class="tag bg-primary">34</span>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="javascript:;">Help</a>
      <a class="dropdown-item" href="">Logout</a>
    </div>
  </div>
  <!-- main navigation -->
  <nav>
    <p class="nav-title">NAVIGATION</p>
    <ul class="nav">
      <!-- dashboard -->
      <li>
        <a href="index.html">
          <i class="material-icons text-primary">home</i>
          <span>Home</span>
        </a>
      </li>
      <!-- /dashboard -->
      <!-- apps -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-success">font_download</i>
          <span class="badge bg-primary pull-right">08</span>
          <span>Apps</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="app-calendar.html">
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="app-media.html">
              <span>Media</span>
            </a>
          </li>
          <li>
            <a href="app-messages.html">
              <span>Messages</span>
            </a>
          </li>
          <li>
            <a href="app-social.html">
              <span>Social</span>
            </a>
          </li>
          <li>
            <a href="app-people.html">
              <span>People</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- /apps -->
      <!-- ui -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-danger">explore</i>
          <span>Chức năng</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="<?php echo base_url() ?>admin/dondathang">
              <span>Đặt hàng</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/donnhaphang">
              <span>Nhập hàng</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/taotrasua">
              <span>Thêm trà sữa</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>admin/laphoadon">
              <span>Lập hóa đơn</span>
            </a>
          </li>
          <li>
            <a href="ui-fontawesome.html">
              <span>Fontawesome</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- /ui -->
      <!-- charts -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons text-warning">assessment</i>
          <span>Charts</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="chart-flot.html">
              <span>Flot</span>
            </a>
          </li>
          <li>
            <a href="chart-easypie.html">
              <span>Easypie</span>
            </a>
          </li>
          <li>
            <a href="chart-chartjs.html">
              <span>ChartJS</span>
            </a>
          </li>
          <li>
            <a href="chart-rickshaw.html">
              <span>Rickshaw</span>
            </a>
          </li>
          <li>
            <a href="chart-c3.html">
              <span>C3js</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- /charts -->
    </ul>
    <p class="nav-title">BONUS</p>
    <ul class="nav">
      <!-- maps -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons">beenhere</i>
          <span>Maps</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="map-google.html">
              <span>Google</span>
            </a>
          </li>
          <li>
            <a href="map-googlefull.html">
              <span>Google fullscreen</span>
            </a>
          </li>
          <li>
            <a href="map-vector.html">
              <span>Vector</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- /maps -->
      <!-- extras -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <span class="badge bg-danger pull-right">HOT</span>
          <i class="material-icons">stars</i>
          <span>Extras</span>
        </a>
        <ul class="sub-menu">
          <!-- emails -->
          <li>
            <a href="javascript:;">
              <span class="menu-caret">
                <i class="material-icons">arrow_drop_down</i></span>
              <span>Transactional Emails</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/action.html" target="_blank">
                  <span>Action</span>
                </a>
              </li>
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/alert.html" target="_blank">
                  <span>Alert</span>
                </a>
              </li>
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/billing.html" target="_blank">
                  <span>Billing</span>
                </a>
              </li>
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/progress.html" target="_blank">
                  <span>Progress</span>
                </a>
              </li>
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/survey.html" target="_blank">
                  <span>Survey</span>
                </a>
              </li>
              <li>
                <a href="http://milestone.nyasha.me/latest/emails/welcome.html" target="_blank">
                  <span>Welcome</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /emails -->
          <li>
            <a href="extra-invoice.html">
              <span>Invoice</span>
            </a>
          </li>
          <li>
            <a href="extra-timeline.html">
              <span>Timeline</span>
            </a>
          </li>
          <li>
            <a href="extra-lists.html">
              <span>Lists</span>
            </a>
          </li>
          <li>
            <a href="extra-signin.html">
              <span>Signin</span>
            </a>
          </li>
          <li>
            <a href="extra-signup.html">
              <span>Signup</span>
            </a>
          </li>
          <li>
            <a href="extra-forgot.html">
              <span>Forgot</span>
            </a>
          </li>
          <li>
            <a href="extra-lockscreen.html">
              <span>Lockscreen</span>
            </a>
          </li>
          <li>
            <a href="extra-404.html">
              <span>404</span>
            </a>
          </li>
          <li>
            <a href="extra-500.html">
              <span>500</span>
            </a>
          </li>
          <li>
            <a href="extra-pricing.html">
              <span>Pricing tables</span>
            </a>
          </li>
          <li>
            <a href="blank.html">
              <span>Starter page</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- /extras -->
      <!-- menu levels -->
      <li>
        <a href="javascript:;">
          <span class="menu-caret">
            <i class="material-icons">arrow_drop_down</i>
          </span>
          <i class="material-icons">line_weight</i>
          <span>Menu levels</span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="javascript:;">
              <span class="menu-caret">
                <i class="material-icons">arrow_drop_down</i>
              </span>
              <span>Menu Item 1.1</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <span class="menu-caret">
                    <i class="material-icons">arrow_drop_down</i>
                  </span>
                  <span>Menu Item 2.1</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <span>Menu Item 3.1</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Menu Item 3.1</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Menu Item 2.2</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <span>Menu Item 1.2</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- menu levels -->
      <li><hr></li>
      <!-- static -->
      <li>
        <a href="http://milestone.nyasha.me/latest/angular" target="_blank">
          <i class="material-icons">navigation</i>
          <span>Angular version</span>
        </a>
      </li>
      <!-- /static -->
      <!-- documentation -->
      <li>
        <a href="http://milestone.nyasha.me/latest/documentation" target="_blank">
          <i class="material-icons">local_library</i>
          <span>Documentation</span>
        </a>
      </li>
      <!-- /documentation -->
    </ul>
  </nav>
  <!-- /main navigation -->
</div>