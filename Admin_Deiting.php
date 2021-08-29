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
            <h2 class="text-bold text-uppercase" style="text-decoration: underline;">Deiting Plan</h2>
             <a href="./Admin_Deiting_sent.php">
              <button type="button" class="btn btn-outline-dark btn-sm">Sent Deiting Plans</button>
            </a>
            <div class="row mt-5" style="width: 99%;">
              <?php
                  include './action.php/db.php';
                  $sql = "select * from dietingplan where status = 'request'";            
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
              ?>
               <div class="col-sm-3">
                <div class="card">
                <?php 
                    if($row["status"] == "request"){
                    ?>
                        <img src="https://betterme.world/articles/wp-content/uploads/2020/05/15-Day-Diet-Meal-Plan-To-Put-Weight-Loss-In-Motion.jpg" class="card-img-top" alt="...">
                    <?php 
                    }else if($row["status"] == 'Reject'){
                        ?>
                        <img src="./img/rejectPlan.jpg" class="card-img-top" alt="...">
                        <?php
                    }else{
                        ?>
                        <img src="./action.php/upload/plans/<?php echo $row["img"] ?>" class="card-img-top" alt="...">
                        <?php 
                    }
                ?>
                  <div class="card-body">
                     
                    <h4 class="text-normal text-danger text-capitalize">User ID<?php echo $row["userID"] ?></h4>
                    <div class="ml-2">
                          <i class="fas fa-angle-double-right"></i> Status : &nbsp;&nbsp; <?php echo $row["status"] ?> <br/>
                          <i class="fas fa-angle-double-right"></i> Age : &nbsp;&nbsp; <?php echo $row["age"] ?> <br/>
                          <i class="fas fa-angle-double-right"></i> Weight : &nbsp;&nbsp; <?php echo $row["weight"] ?> <br/>
                          <i class="fas fa-angle-double-right"></i> Height : &nbsp;&nbsp; <?php echo $row["height"] ?> <br/><br/>
                    </div>
                    <div class="text-right">
                        <a href="./action.php/admin_reject_Deiting.php?id=<?php echo $row["id"] ?>" type="submit" class="btn btn-danger btn-sm">Reject</a>
                        <a href="Admin_Add_Deiting_Plan.php?id=<?php echo $row["id"] ?>" class="btn btn-dark btn-sm">Accept</a>
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
