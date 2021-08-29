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
            <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
              <div class="card">
                <div class="card-body">
                    <center>
                            <h3 class="text-uppercase" >Update Lab Test</h3>
                        </center>
                        <br/>
                         <?php
                            include './action.php/db.php';
                            $id = $_REQUEST['id'];
                            $sql = "select * from labtest where id = '$id'";            
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <form action="./action.php/admin_update_lab.php"  method="post" class="ml-5" enctype="multipart/form-data">
                           <div class="mb-3">
                                <span for="exampleFormControlInput1" class="form-label text-normal">Test Name</span>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" >
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>" >
                            </div>
                            <div class="mb-3">
                                <span for="exampleFormControlInput1" class="form-label text-normal">Price</span>
                                <input type="text" class="form-control" name="price" id="price" value="<?php echo $row['price']; ?>" >
                            </div>
                            <div class="mb-3">
                                <span for="exampleFormControlInput1" class="form-label text-normal">Description</span>
                                <textarea type="text" class="form-control" rows="5" name="Description" id="Description" ><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="d-grid gap-2 text-right">
                                <button class="btn btn-dark btn-sm" id="register" type="submit" type="submit">Submit</button>
                                <a href="./Admin.php" >
                                  <button class="btn btn-outline-dark btn-sm"  type="button">Back</button>
                                </a>
                            </div>
                        </form>
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
            <div class="col-sm-2">
            </div>
          </div>
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
