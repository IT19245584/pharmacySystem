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
      include './nav.php';
    ?>

    <div class="tab-content">
      <div class="container mt-5 ml-5"> 
            <h2 class="text-bold text-uppercase" style="text-decoration: underline;">Requested Lab Test</h2>
             <a href="./Admin_LabTest.php">
              <button type="button" class="btn btn-outline-dark btn-sm">Back</button>
            </a>&nbsp;
            <div class="row mt-5" style="width: 99%;">
              <?php
                  include './action.php/db.php';
                  $sql = "select * from labtestrequest where status = 'Request'";            
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
              ?>
               <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                     
                    <div class="ml-2">
                          <i class="fas fa-angle-double-right"></i> Lab Test ID: &nbsp;&nbsp; <?php echo $row["id"] ?> <br/>
                          <i class="fas fa-angle-double-right"></i> Patient ID: &nbsp;&nbsp; <?php echo $row["pID"] ?> <br/>
                          <i class="fas fa-angle-double-right"></i> Lab Test : &nbsp;&nbsp; <?php echo $row["testID"] ?> <br/><br/>
                    </div>
                    <div class="text-right">
                        <a href="Admin_view_lab.php?id=<?php echo $row["id"] ?>" class="btn btn-dark btn-sm">View</a>
                    </div>
                  </div>
                </div>
              </div>
               <?php
                      }
                } else {
              ?>
              <center>
                <img src="./img/nodatafound.png" />
              </center>
              <?php
                }
              ?>
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
