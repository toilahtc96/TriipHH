<!-- jQuery -->
<script src="{!! asset('bower_components/adminlte/plugins/jquery/jquery.min.js') !!}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('bower_components/adminlte/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>

<script src="{!! asset('bower_components/adminlte/plugins/datatables/jquery.dataTables.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{!! asset('bower_components/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('bower_components/adminlte/plugins/chart.js/Chart.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('bower_components/adminlte/plugins/sparklines/sparkline.js') !!}"></script>
<!-- JQVMap -->
<script src="{!! asset('bower_components/adminlte/plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
<script src="{!! asset('bower_components/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('bower_components/adminlte/plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('bower_components/adminlte/plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('bower_components/adminlte/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
  src="{!! asset('bower_components/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}">
</script>
<!-- Summernote -->
<script src="{!! asset('bower_components/adminlte/plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('bower_components/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}">
</script>
<!-- AdminLTE App -->
<script src="{!! asset('bower_components/adminlte/dist/js/adminlte.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('bower_components/adminlte/dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('bower_components/adminlte/dist/js/demo.js') !!}"></script>

{{-- <script src="{!! asset('bower_components/ckeditor/ckeditor.js') !!}"></script> --}}
<script src="{!! asset('js/common/image-upload.js') !!}"></script>
<script src="{!! asset('js/common/multi-image-upload.js') !!}"></script>

<script src="{!! asset('js/common/call-ajax.js') !!}"></script>
<script src="{!! asset('js/hotels/edit-hotels.js') !!}"></script>
<script src="{!! asset('js/book-js/book-status.js') !!}"></script>
<script src="{!! asset('js/bookcombo-js/bookcombo.js') !!}"></script>
<script src="{!! asset('js/admin.js') !!}"></script>
<script src={{ url('ckeditor/ckeditor.js') }}></script>
<script>
  CKEDITOR.replace( 'text', {
    filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

} );
</script>
@include('ckfinder::setup')
@include('admin/common/modal-error')