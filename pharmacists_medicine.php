<?php
session_start();
?>
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
            <h2 class="text-bold text-uppercase" style="text-decoration: underline;">Medicines List</h2>
            <a href="pharmacist_MedicineAdd.php">
              <button type="button" class="btn btn-outline-dark btn-sm">Add Medicines</button>
            </a>
            <div class="row mt-5" style="width: 99%;">
              <?php
                  include './action.php/db.php';
                  $Pharmacist = $_SESSION['user'];
                  $sql = "select * from medicine where PharmacistId='$Pharmacist'";            
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
              ?>
               <div class="col-sm-3">
                <div class="card">
                
                  <div class="card-body">
                     <img src="./action.php/upload/medicine/<?php echo $row["imageName"] ?>" class="card-img-top" alt="...">
                    <h4 class="text-normal text-danger text-capitalize"><?php echo $row["name"] ?></h4>
                    <div class="ml-2">
                         Medicine ID : &nbsp;&nbsp; <?php echo $row["id"] ?> <br/>
                         Medicine Type : &nbsp;&nbsp; <?php echo $row["type"] ?> <br/>
                         Medicine Price : &nbsp;&nbsp; LKR.<?php echo $row["price"] ?>.00 <br/>
                        <br/>
                    </div>
                    <div class="text-right">
                        <a href="./action.php/Pharmacist_delete_medicine.php?id=<?php echo $row["id"] ?>&img=<?php echo $row["imageName"] ?>" type="submit" class="btn btn-dark btn-sm">Delete</a>
                        <a href="pharmacists_update_medicine.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">Update</a>
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
