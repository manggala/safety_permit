<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pelaporan Safety Permit | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::to('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/iCheck/flat/blue.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/morris/morris.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{ URL::to('assets/plugins/datatables/dataTables.bootstrap.css')}}">
<style type="text/css">
button{
  overflow: hidden;
}
</style>
</head>
<body class="sidebar-mini wysihtml5-supported skin-purple-light">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">P<b>L</b>a</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Pe<b>Lapor</b>an</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{URL::to('logout')}}" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Navigasi Menu</li>
        <li>
          <a href="{{URL::to('safety-permit')}}">
            <i class="fa fa-warning"></i> <span>Safety Permit</span>
          </a>
        </li>
        <li>
          <a href="{{URL::to('accident-report')}}">
            <i class="fa fa-ambulance"></i> <span>Accident Report</span>
          </a>
        </li>
        <li>
          <a href="{{URL::to('emergency-report')}}">
            <i class="fa fa-bell"></i> <span>Emergency Report</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div></div>
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->
<div id="detailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHeaderDetail">Hasil</h4>
      </div>
      <div class="modal-body" id="modalBodyDetail">
        <p>Tunggu Sebentar</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="konfirmasiModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHeaderKonfirmasi">Konfirmasi</h4>
      </div>
      <div class="modal-body" id="modalBodyKonfirmasi">
        <p>Tunggu Sebentar</p>
      </div>
    </div>
  </div>
</div>
<script src="{{URL::to('assets/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="{{URL::to('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{URL::to('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{URL::to('assets/plugins/knob/jquery.knob.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="{{URL::to('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::to('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{URL::to('assets/dist/js/app.min.js')}}"></script>
<script src="{{URL::to('assets/dist/js/pages/dashboard.js')}}"></script>
<script src="{{URL::to('assets/dist/js/demo.js')}}"></script>

<script src="{{URL::to('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::to('assets/dist/js/app.min.js')}}"></script>
<script src="{{URL::to('assets/dist/js/demo.js')}}"></script>
<script>
    $("#example1").DataTable();
</script>
<script type="text/javascript">
function detailModal(target){
  var target = $(target);
  $("#modalHeaderDetail").text("Lihat Hasil");
  $("#modalBodyDetail").text("Tunggu Sebentar ...");
  $.get("ajax/detail/" + target.attr("tipe").toString() + "/" + target.attr("idTipe").toString(), function(data){
    $("#modalBodyDetail").html(data);
  });
}

function konfirmasiModal(target){
  var target = $(target);
  $("#modalHeaderKonfirmasi").text("Lihat Hasil");
  $("#modalBodyKonfirmasi").text("Tunggu Sebentar ...");
  $.get("ajax/konfirmasi/" + target.attr("tipe").toString() + "/" + target.attr("idTipe").toString(), function(data){
    $("#modalBodyKonfirmasi").html(data);
  });
}
</script>

<script type="text/javascript">
function ShowHidden(target){
  $(target).siblings().slideDown();
  $(target).slideUp();
}
function HideShowen(target){
  $(target).parent().siblings().slideDown();
  $(target).parent().slideUp();
}
</script>
</body>
</html>
