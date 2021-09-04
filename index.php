<?php 
  include('options/autoload.php');

  use options\Script;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Oila Market</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?a=main" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?a=kreditlash" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kreditlash</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?a=haridorlar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Haridorlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?a=prasrochka" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prasrochka</p>
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

  <!-- Content Wrapper. Contains page content -->
  <?php
    $page = $_GET['a'] ?? "main";
    include("pages/".$page.".php");
  ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Jaymi.gr</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $("#client_kodi").keypress(function(e) {
            var key = e.which;
            if (key == 13) // the enter key code
            {
                $("#search_client").click();
            }
        });

        $("#search_client").click(function(){
            var client_kodi = $("#client_kodi").val();
            if (client_kodi != '') {
                $.ajax({
                    url:"json_encode/client_info.php",
                    type:"POST",
                    datatype:"JSON",
                    data:{'client_kodi':client_kodi},
                    success:function(data){
                        $("#client_table").html(data);
                        $("#client_kodi").val("");
                        if (!data){
                            alert("Bunday IDga tegishli klient mavjud emas!");
                        }
                    }
                })
            }
            else{
                alert("CLient kodini kiriting!");
                $("#client_table").html("");
            }
        });
    });

    $(document).ready(function(){
        $(document).on('click', '#insert_button', function(){
            startSpinner();

            var client_id = $("#client_id").html();

            $.ajax({
                url:"json_encode/client_tekshir.php",
                type:"POST",
                datatype:"JSON",
                data:{'client_id':client_id},
                success:function(val){
                    var info = JSON.parse(val);
                    if (info.status == 1){
                        var izox;
                        if (info.credit_status == 1){
                            izox = "to'liq yopilgan";
                        }
                        if(info.credit_status == 0){
                            izox = "to'liq yopilmagan";
                        }
                        $("#modal_text").html("("+info.client_kodi+")-raqamli klientning ("+info.credit_kodi+")-tartibli "+izox+" krediti mavjud! (YES) tugmasini bossangiz ushbu klient raqamiga (02)-tartibli kredit shakillantiriladi! Rad etish uchun (NO) tugmasini bosing!")
                        $("#modal-info").modal('toggle');
                        stopSpinner();
                    }
                    if(info.status == 2){
                        $.ajax({
                            url:"json_encode/client_insert.php",
                            type:"POST",
                            datatype:"JSON",
                            data:{'client_id':client_id},
                            success:function(val){
                                var obj = JSON.parse(val);
                                if (obj.a){
                                    alert("Ma'lumotlar bazaga saqlandi!");
                                    $("#client_table").html("");
                                    stopSpinner1();
                                }else {
                                    alert("Ma'lumotlar bazaga saqlanmadi qaytadan urinib ko'ring!");
                                    stopSpinner();
                                }
                            }
                        })
                    }
                }
            })
        });

        $(document).on('click', '#insert_ok', function(){
            startSpinner1();
            var client_id = $("#client_id").html();
            $.ajax({
                url:"json_encode/client_insert.php",
                type:"POST",
                datatype:"JSON",
                data:{'client_id':client_id},
                success:function(val){
                    var obj = JSON.parse(val);
                    if (obj.a){
                        alert("Ma'lumotlar bazaga saqlandi!");
                        $("#client_table").html("");
                        $("#modal-info").modal('toggle');
                        stopSpinner1();
                    }else {
                        alert("Ma'lumotlar bazaga saqlanmadi qaytadan urinib ko'ring!");
                        stopSpinner();
                    }
                }
            })
        });

        function startSpinner() {
            $("#insert_button").prop("disabled", true);
            $("#insert_button").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
        }
        function stopSpinner() {
            $("#insert_button").prop("disabled", false);
            $("#insert_button").html("Insert");
        }

        function startSpinner1() {
            $("#insert_ok").prop("disabled", true);
            $("#insert_ok").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
        }
        function stopSpinner1() {
            $("#insert_ok").prop("disabled", false);
            $("#insert_ok").html("YES");
        }

    });
</script>

<?php Script::show() ?>
</body>
</html>
