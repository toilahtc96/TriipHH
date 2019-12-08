  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 " >
        <!-- Brand Logo -->
  
        <a href="/admin" class="brand-link">
          <img src="{!! asset('bower_components/adminlte/dist/img/AdminLTELogo.png') !!}" alt=" AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Quản lý Web HHTravel</span>
        </a>
  
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{!! asset('bower_components/adminlte/dist/img/user2-160x160.jpg') !!}"" class=" img-circle
                elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Công Hoàng</a>
            </div>
          </div>
  
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Quản lý đặt vé
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/bookcombos" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Đặt Theo Combo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/bookcustomtrips" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Đặt tùy chọn</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/bookcars" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Đặt xe</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/bookrooms" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Đặt phòng</p>
                      </a>
                    </li>
                </ul>
              </li>

              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                     Quản lý thông tin 
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/admin/hotels" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý khách sạn</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/roomhotels" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý Phòng</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/locations" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý địa điểm</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/cars" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý xe</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/combotypes" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý loại combo</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/combotrips" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý Combo</p>
                      </a>
                    </li>
                  </ul>
                </li>
            
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>