<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK - {{ $title }}</title>
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('dist/img/Logo.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- My Style --}}
  <link rel="stylesheet" href="{{ URL::asset('back/css/backStyle.css') }}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/select2/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>TI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SPK</b>LTI</span>
    </a>


    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('dist/img/user2-160x160.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">

                <p>
                    {{ auth()->user()->name }}
                  <small>Selamat Datang</small>
                </p>
              </li>
        
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">Logout</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      @include('partials.menu')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Main content -->
    
    <!-- /.content -->
  
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 </strong> Sistem Pedukung Keputusan
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('vendor/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('vendor/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
@yield('js_script')
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
{{-- <script src="{{ URL::asset('vendor/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/morris/morris.min.js') }}"></script> --}}
<!-- Sparkline -->
<script src="{{ URL::asset('vendor/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('vendor/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('vendor/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('vendor/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('vendor/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('vendor/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ URL::asset('dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE dashboard2 demo (This is only for demo purposes) -->
{{-- <script src="{{ URL::asset('dist/js/pages/dashboard2.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('vendor/plugins/select2/select2.full.min.js') }}"></script>

{{-- <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    // //Datemask dd/mm/yyyy
    // $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    // //Datemask2 mm/dd/yyyy
    // $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    // //Money Euro
    // $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //     {
    //       ranges: {
    //         'Today': [moment(), moment()],
    //         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
    //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //         'This Month': [moment().startOf('month'), moment().endOf('month')],
    //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //       },
    //       startDate: moment().subtract(29, 'days'),
    //       endDate: moment()
    //     },
    //     function (start, end) {
    //       $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    //     }
    // );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script> --}}
</body>
</html>
