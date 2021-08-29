<?php
  session_start();
  $userId = $_SESSION["user"];
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
            <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
              <div class="card">
                <div class="card-body">
                    <center>
                            <h3 class="text-uppercase" >Pharmacist Profile </h3>
                        </center>
                        <br/>
                        <?php
                            include './action.php/db.php';
                            $sql = "select * from pharmacist where userName='$userId'";            
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="card shadow-none">
                            <div class="card-body shadow-none">
                               <img src="./action.php/upload/<?php echo $row["imageName"] ?>" class="img-fluid" alt="...">
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card shadow-none">
                            <div class="card-body">
                                <h5 class="card-title">
                                     <p style="line-height:12px;">Full Name : <?php echo $row["name"] ?></p>
                                     <p style="line-height:12px;">Email : <?php echo $row["userName"] ?><br/></php>
                                     <p style="line-height:12px;">Mobile Number : <?php echo $row["mobileNo"] ?><br/></p>
                                     <p style="line-height:12px;">Location : <?php echo $row["location"] ?><br/></p>
                                     <p style="line-height:12px;">Reg Date & Time : <?php echo $row["timeStamp"] ?><br/></p>
                                </h5>
                               
                            </div>
                             <div class="ml-4">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-dark btn-sm">Edit</button>
                                    <a href="Pharmacist.php">
                                        <button type="button" class="btn btn-danger btn-sm">Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                       <?php
                      }
                } else {}
              ?>
                </div>
              </div>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade bg-white" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content shadow-sm">
        <div class="modal-header bg-dark text-white">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
            
        </div>
          <?php
                include './action.php/db.php';
                $sql = "select * from pharmacist where userName='$userId'";            
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
            ?>
            <form action="./action.php/Pharmacist_profile_update.php"  method="post" enctype="multipart/form-data">
            <div class="modal-body">
           
            <div class="mb-3 mt-2">
                <span for="exampleFormControlInput1" class="form-label">Pharmacy Name</span>
                <input type="text" class="form-control" name="FullName" value="<?php echo $row["name"] ?>" id="FullName" >
                <input type="hidden" class="form-control" name="id" value="<?php echo $userId ?>" id="id" >
            </div>
            <div class="mb-3">
                <span for="exampleFormControlInput1" class="form-label">Address</span>
                <input type="text" class="form-control" name="Address" id="Address" value="<?php echo $row["location"] ?>">
            </div>
            <div class="mb-3">
                <span for="exampleFormControlInput1" class="form-label">Mobile Number</span>
                <input type="tel" class="form-control" name="Number" id="Number" value="<?php echo $row["mobileNo"] ?>">
            </div>
             
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Edit</button>
        </div>
        <?php
                      }
                } else {}
        ?>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
