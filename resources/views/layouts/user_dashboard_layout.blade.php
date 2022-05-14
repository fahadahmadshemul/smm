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
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('/')}}public/Backend/plugins/bs-stepper/css/bs-stepper.min.css">
  
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
    
  </div>---->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Navbar Center--->
    <ul class="navbar-nav mx-auto ">
      <li class="nav-item d-none d-md-block d-lg-block">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm">Earning : $ @convert(Auth::user()->earning_balance)</a>
      </li>
      <li class="nav-item d-none d-md-block d-lg-block">
        <a href="javascript:void(0)" class="ml-2 btn btn-success btn-sm">Deposit : $ @convert(Auth::user()->deposit_balance)</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)"><strong>ID : {{Auth::user()->member_ship_id}}</strong></a>
      </li>
      <li class="nav-item">
        <div class="nav-link">
            <div class="fb-share-button" data-href="https://developers.facebook.com/pagemag" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fpagemag&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        </div>
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if (Auth::user()->profile_image == NULL)
              <i class="fas fa-user"></i>
          @else
          <img style="max-height: 30px; border-radius:50%" src="{{URL::to(Auth::user()->profile_image)}}" alt="">
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Hello, {{Auth::user()->name}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('my-profile')}}" class="dropdown-item">
            <i class="fas fa-address-card mr-2"></i> Profile
          </a>
          <a href="{{route('wallet')}}" class="dropdown-item">
            <i class="fas fa-wallet mr-2"></i> Wallet
          </a>
          <a href="{{route('top-job-poster')}}" class="dropdown-item">
            <i class="fas fa-chart-bar mr-2"></i>  Top Job Poster
          </a>
          <a href="{{route('top-refer')}}" class="dropdown-item">
            <i class="fas fa-chart-line mr-2"></i>  Top Refer
          </a>
          <a href="{{route('refer-now')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Refer Now
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('support')}}" class="dropdown-item">
            <i class="fas fa-headset mr-2"></i>Support
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('change-my-password')}}" class="dropdown-item">
            <i class="fas fa-edit mr-2"></i> Change Password
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
  <div class="d-none d-sm-block d-md-none text-center">
    <a href="javascript:void(0)" class="btn btn-primary btn-sm">Earning : $ @convert(Auth::user()->earning_balance)</a>
    <a href="javascript:void(0)" class="ml-2 btn btn-success btn-sm">Deposit : $ @convert(Auth::user()->deposit_balance)</a>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <a href="{{route('find-job')}}" class="brand-link">
          {{-- <img src="" alt="Logo" class="img-fluid" style="opacity: 1;max-height:80px;max-width:120px;"> --}}
          
      <h4 class="text-center">User Pannel</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->is_verified == 1)
              <li class="nav-item bg-success">
                <a href="javascript:void(0)" class="nav-link">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>
                    Verified
                  </p>
                </a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{route('verify-user')}}" class="nav-link bg-danger">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>
                    Verify Now
                  </p>
                </a>
              </li>
            @endif
            <li class="nav-item {{Request::is('dashboard') ? 'menu-open':''}}">
              <a href="{{route('find-job')}}" class="nav-link">
                <i class="nav-icon fas fa-search-dollar"></i>
                <p>
                  Find Job
                </p>
              </a>
            </li>
            <li class="nav-item {{Request::is('dashboard/post-job') ? 'menu-open':''}}">
              <a href="{{route('post-job')}}" class="nav-link">
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>
                  Post A Job
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview {{Request::is('dashboard/work') || Request::is('dashboard/work-accepted')  ? 'menu-open':''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  My Work 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item {{Request::is('dashboard/work') ? 'active':''}}">
                  <a href="{{route('work')}}" class="nav-link {{Request::is('dashboard/work') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">My Task</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('work-accepted')}}" class="nav-link {{Request::is('dashboard/work-accepted') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">Accepted Task</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{Request::is('dashboard/my-job') ? 'menu-open':''}}">
              <a href="{{route('my-job')}}" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  My Job
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview {{Request::is('dashboard/manual-deposit') || Request::is('dashboard/pending-job') || Request::is('dashboard/approved-job') || Request::is('dashboard/paused-job') || Request::is('dashboard/completed-job') ? 'menu-open':''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Deposit 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item {{Request::is('dashboard/pending-job') ? 'active':''}}">
                  <a href="{{route('pending-job')}}" class="nav-link {{Request::is('dashboard/pending-job') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">Instant Deposit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('manual-deposit')}}" class="nav-link {{Request::is('dashboard/manual-deposit') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">Manual Deposit</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{Request::is('dashboard/withdraw-history') || Request::is('dashboard/deposit-history')  ? 'menu-open':''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-donate"></i>
                <p>
                  Transcation 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{route('withdraw-history')}}" class="nav-link {{Request::is('dashboard/withdraw-history') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">Withdraw</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('deposit-history')}}" class="nav-link {{Request::is('dashboard/deposit-history') ? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="sub_menu">Deposit</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item {{Request::is('dashboard/ads') ? 'menu-open':''}}">
              <a href="{{route('ads')}}" class="nav-link">
                <i class="nav-icon fas fa-ad"></i>
                <p>
                  Advertisement
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview {{Request::is('dashboard/notice') ? 'menu-open':''}}">
              <a href="{{route('notice')}}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Notice Board
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
  <div id="fb-root"></div>
</div>
<!-- ./wrapper -->
@include('admin.inc.modal')
<!----facebook share plugin-------->

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="NKZGL6z7"></script>
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
<!-- BS-Stepper -->
<script src="{{asset('/')}}public/Backend/plugins/bs-stepper/js/bs-stepper.min.js"></script>

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
                    "timeOut": 10000,
                    "extendedTimeOut": 10000,
                  }
              toastr.info("{{Session::get('message')}}");
              break;
          case 'success':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true,
                "timeOut ": 10000,
                "extendedTimeOut": 10000,
              }
              toastr.success("{{Session::get('message')}}");
              break;
          case 'warning':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true,
                "timeOut ": 10000,
                "extendedTimeOut": 10000,
              }
              toastr.warning("{{Session::get('message')}}");
              break;
          case 'error':
          toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true,
                "timeOut ": 10000,
                "extendedTimeOut": 10000,
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
    });
    $(document).on('click', '#SatisfyAll', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          icon: 'info',
          text: 'Are Your Sure ?',
          showCancelButton: true,
          confirmButtonText: 'Satisfy All',
          confirmButtonColor: '#28a745',
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
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
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
<script>
  var stepper1Node = document.querySelector('#stepper1')
  var stepper1 = new Stepper(document.querySelector('#stepper1'))

  stepper1Node.addEventListener('show.bs-stepper', function (event) {
    console.warn('show.bs-stepper', event)
  })
  stepper1Node.addEventListener('shown.bs-stepper', function (event) {
    console.warn('shown.bs-stepper', event)
  })

  var stepper2 = new Stepper(document.querySelector('#stepper2'), {
    linear: false,
    animation: true
  })
  var stepper3 = new Stepper(document.querySelector('#stepper3'), {
    animation: true
  })
  var stepper4 = new Stepper(document.querySelector('#stepper4'))
</script>
<script>
  $(function(){
  new Clipboard('.copy-text');
});
  
</script>
<script>
  var loadFile = function(event, id) {
    var output = id;
    console.log(output);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
</script>
<script>
  var loadProfile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    $('#profile_submit_button').removeClass('d-none');
  };
</script>
</body>
</html>
