
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
                <div class="card-body mb-5">
                    <center>
                            <h3 class="text-uppercase" >List Of Item (Non - Prescription)</h3>
                    </center>
                    <br/>
                    <?php
                        include './action.php/db.php';
                        $id = $_REQUEST['id'];
                        $sql = "select i.orderId as 'orderId', i.status as 'status', p.name as 'name', p.id as 'pId', p.address as 'address', p.mobileNo as 'mobileNo' from item_order i, patient p where i.pId = p.id and i.orderId=$id";            
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="card shadow-none">
                            <div class="card-body">
                              <h5 style="font-size: 18px;">Patient Id : <?php echo $row["pId"] ?></h5>
                              <h5 style="font-size: 18px;">Patient Name : <?php echo $row["name"] ?></h5>
                              <h5 style="font-size: 18px;">Patient Address : <?php echo $row["address"] ?></h5>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card shadow-none">
                             <div class="card-body">
                              <h5 style="font-size: 18px;">Patient Mobile Number : <?php echo $row["mobileNo"] ?></h5>
                              <h5 style="font-size: 18px;">Status : <?php echo $row["status"] ?></h5>
                              <a href="./action.php/Pharmacist_item_ordering_update.php?id=<?php echo $id ?>">
                                  <input type="submit" value="Update" class="btn btn-success btn-sm"/>
                              </a>
                            </div>
                            </div>
                        </div>
                        </div>
                          <?php
                            }
                                } else {}
                          ?>
                     <br/>
                        <table class="table ">
                        <thead>
                            <tr class="bg-dark text-center">
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include './action.php/db.php';
                                $id = $_REQUEST['id'];
                                $Total = 0;
                                $sql = "select * from order_item_one where order_id ='$id' ";            
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr class=" text-center">
                                <th scope="row"><?php echo $row["item"] ?></th>
                                <td>RS.<?php echo $row["price"] ?>.00</td>
                                <td><?php echo $row["qty"] ?></td>
                                <td>
                                    RS.<?php 
                                       $subTotal = intval($row["price"])*intval($row["qty"]); 
                                       $Total =  $Total+ $subTotal; 
                                       echo  $subTotal; ?>.00
                                </td>
                            </tr>
                            <?php
                                }
                                    } else {}
                            ?>
                              <tr class=" text-center">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Total Price : </th>
                                <th scope="col">LKR.<?php echo $Total ?>.00</th>
                            </tr>
                        </tbody>
                        </table>
                </div>
              </div>
            </div>
            <div class="col-sm-1">
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
