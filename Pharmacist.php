<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suwahala</title>
  <link rel="icon" href="./img/tabLogo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">
    <?php 
      include './nav_pharmacists.php';
    ?>

    <div class="tab-content">
      <div class="container mt-5 ml-5"> 
            <h2 class="text-bold text-uppercase" style="text-decoration: underline;">Pharmacist Dashboard</h2>
            <div class="row mt-4">
            <div class="col-sm-4">
                <div class="card bg-dark">
                <div class="card-body  text-center">
                  <a href="pharmacists_medicine.php" class="text-decoration-none text-white" >          
                   <span style="font-size:90px;">
                        <i class="fas fa-mortar-pestle"></i>
                    </span>
                   <h3>List Of The Medicines</h3>
                  </a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-dark">
                <div class="card-body text-center">
                  <a href="pharmacist_Prescription_order.php" class="text-decoration-none text-white" >          
                  <span style="font-size:90px;">
                        <i class="fas fa-pills"></i>
                  </span>
                  <h3>Perception Orders</h3>
                  </a>
                </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card bg-dark">
                <div class="card-body text-center">
                  <a href="pharmacist_non_Prescription_order.php" class="text-decoration-none text-white" >          
                  <span style="font-size:90px;">
                        <i class="fas fa-capsules"></i>
                  </span>
                  <h3>Non - Perception Orders</h3>
                  </a>
                </div>
                </div>
            </div>
            </div>
      </div>
    </div>
  </div>

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
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>
</html>
