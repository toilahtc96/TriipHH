<!DOCTYPE html>
<html>

@include('admin.shared.header')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('admin.shared.sidebar-top')

    @include('admin.shared.sidebar-main')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      @include('admin.shared.admin-url')
      <!-- /.content-header -->
      @include('admin.shared.four-tip')
      <!-- @yield('content-admin') -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="container col-lg-12 connectedSortable">
          <div class="col-lg-12">
            @include('admin/common/error-validate')
            @include('admin/common/flash-message')
           
          </div>
          @yield('content')


        </div>
      </div>
    </div>

    <!-- /.card-footer-->
    <!-- /.content-wrapper -->
    @include('admin.shared.footer')


  </div>

  @include('admin.shared.scriptAdmin')
</body>

</html>