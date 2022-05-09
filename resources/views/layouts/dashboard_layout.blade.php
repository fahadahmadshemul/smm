<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMM || @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{URL::to($setting->favicon)}}" />
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!--sweet alert-->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/dropzone/min/dropzone.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!---bootstrap toggler button--->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/dist/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/dist/css/custom.css">
  <style>
    .layout-fixed .wrapper .sidebar {
      height: calc(100vh - (5.5rem + 1px));
    }
    body{
      font-size: 15px;
    }
    .small-icon{
      font-size: 10px !important;
    }
    .required{
      color : red;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!---<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="" alt="AdminLTELogo" height="60" width="60">
  </div>--->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item">
            <i class="fas fa-cogs fa-fw mr-2"></i> Setting
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('change-password')}}" class="dropdown-item">
            <i class="fas fas fa-edit mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt mr-2"></i>
                {{ __('Logout') }}
            </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <a href="{{route('admin')}}" class="brand-link">
          {{-- <img src="" alt="Logo" class="img-fluid" style="opacity: 1;max-height:80px;max-width:120px;"> --}}
          
      <h4 class="text-center">SMM</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link {{Request::is('dashboard') ? 'active':''}}">
              <i class="nav-icon fas fa-life-ring"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/all-job') || Request::is('dashboard/pending-job') || Request::is('dashboard/approved-job') || Request::is('dashboard/paused-job') || Request::is('dashboard/completed-job') ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Jobs 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{Request::is('dashboard/pending-job') ? 'active':''}}">
                <a href="{{route('pending-job')}}" class="nav-link {{Request::is('dashboard/pending-job') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Pending Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('approved-job')}}" class="nav-link {{Request::is('dashboard/approved-job') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Approved Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('paused-job')}}" class="nav-link {{Request::is('dashboard/paused-job') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Pause Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('completed-job')}}" class="nav-link {{Request::is('dashboard/completed-job') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Complete Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-job')}}" class="nav-link {{Request::is('dashboard/all-job') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">All Jobs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/all-advertisement') || Request::is('dashboard/pending-advertisement')  ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>
                Advertisement 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{Request::is('dashboard/pending-advertisement') ? 'active':''}}">
                <a href="{{route('pending-advertisement')}}" class="nav-link {{Request::is('dashboard/pending-advertisement') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Pending Advertisement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-advertisement')}}" class="nav-link {{Request::is('dashboard/all-advertisement') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">All Advertisement</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/location') ? 'menu-open':''}}">
            <a href="{{route('location')}}" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Location
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/category') ? 'menu-open':''}}">
            <a href="{{route('category')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/all-user') ? 'menu-open':''}}">
            <a href="{{route('all-user')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/notices') ? 'menu-open':''}}">
            <a href="{{route('notices')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Notice Board
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/add-page') || Request::is('dashboard/all-page')  ? 'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>
                Pages 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{Request::is('dashboard/add-page') ? 'active':''}}">
                <a href="{{route('add-page')}}" class="nav-link {{Request::is('dashboard/add-page') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">Add Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-page')}}" class="nav-link {{Request::is('dashboard/all-page') ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="sub_menu">All Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('dashboard/setting') ? 'menu-open':''}}">
            <a href="{{route('setting')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
</div>
<!-- ./wrapper -->
@include('admin.inc.modal')

<!--jquery -->
<script src="{{asset('/')}}public/Backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}public/Backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}public/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}public/Backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}public/Backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/')}}public/Backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}public/Backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}public/Backend/plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}public/Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}public/Backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}public/Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}public/Backend/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}public/Backend/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}public/Backend/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="{{asset('/')}}public/Backend/plugins/sweetalert2/sweetalert2.min.js"></script>
<!----toastr------>
<script src="{{asset('/')}}public/Backend/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/')}}public/Backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}public/Backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!----bootstrap toggler button---->
<script src="{{asset('/')}}public/Backend/dist/js/bootstrap-toggle.min.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );

  </script>
  <!---summernote---->
  <script>
    $(function () {
    // Summernote
    $('#summernote').summernote();
    $('#summernote2').summernote();
    $('#summernote3').summernote();
  })
  </script>
<!-----toastr script--------->
<script>
  @if(Session::has('message'))
      var type = "{{Session::get('alert-type', 'info')}}"
      switch (type) {
          case 'info':
              toastr.options =
                  {
                    "closeButton": true,
                    "progressBar": true,
                  }
              toastr.info("{{Session::get('message')}}");
              break;
          case 'success':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
              toastr.success("{{Session::get('message')}}");
              break;
          case 'warning':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
              toastr.warning("{{Session::get('message')}}");
              break;
          case 'error':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
              toastr.error("{{Session::get('message')}}");
              break;
      }
  @endif
</script>
<!-----sweetalert script--------->
  <script type="text/javascript">
    $(document).on('click', '#Delete', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          icon: 'warning',
          text: 'Do you want to delete this?',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          confirmButtonColor: '#e3342f',
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link;
          }else{
            swal.fire('Safe Data');
          }
      });
    })
</script>

<script src="{{asset('/')}}public/Backend/js/custom.js"></script>
<!-- Select2 -->
<script src="{{asset('/')}}public/Backend/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('/')}}public/Backend/plugins/dropzone/min/dropzone.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

</script>

</body>
</html>
