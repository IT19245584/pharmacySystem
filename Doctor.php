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
  <style>

      /* The popup chat - hidden by default */
      .chat-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      /* Add styles to the form container */
      .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
      }
      /* Full-width textarea */
      .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 200px;
      }

      /* When the textarea gets focus, do something */
      .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
      }
  
      </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">
    <?php 
      include './nav_doctor.php';
    ?>

    <div class="tab-content">
      <div class="container mt-5 ml-5"> 
            <h2 class="text-bold text-uppercase" style="text-decoration: underline;">List Of Appointments</h2>
            <div class="row mt-5" style="width: 99%;">
              <?php
                 
                  $id = $_SESSION['user'];
                  include './action.php/db.php';
                  $sql = "select * from appointment where DoctorId = '$id'";            
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
              ?>
               <div class="col-sm-3">
                <div class="card">
                
                  <div class="card-body">
                    <h4 class="text-normal text-danger text-capitalize">Appoinment Id - <?php echo $row["id"] ?></h4>
                    <div class="ml-2">
                         Email : &nbsp;&nbsp; <?php echo $row["pName"] ?> <br/>
                         Address : &nbsp;&nbsp; <?php echo $row["address"] ?> <br/>
                         Mobile Number : &nbsp;&nbsp; <?php echo $row["pMobile"] ?> <br/>
                         Appoinment Data & Time : &nbsp;&nbsp;<br/>  &nbsp;&nbsp;<?php echo $row["pDateTime"] ?><br/>
                        <br/>
                    </div>
                    <div class="text-right">
                      <?php
                          if($row["status"]=='Pending'){
                      ?>
                        <a href="./action.php/Doctor_statusUpdate.php?id=<?php echo $row["id"] ?>&value=Accept" type="submit" class="btn btn-outline-success btn-sm">Accept</a>
                        <a href="./action.php/Doctor_statusUpdate.php?id=<?php echo $row["id"] ?>&value=Reject" type="submit" class="btn btn-outline-danger btn-sm">Reject</a>
                        <?php
                          }else if($row["status"]=='Reject'){ ?>
                            <a type="submit" class="btn btn-danger btn-sm">Rejected</a>
                         <?php } else{
                        ?>
                            <a type="submit" class="btn btn-success btn-sm">Approved</a>
                        <?php }
                        ?>
                            <a href="#" onclick='openForm()' class="btn btn-dark btn-sm">Chat</a>
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
  <div class="chat-popup" id="myForm">
    <form action="./action.php/chat.php" method="post" class="form-container">
      <h3>Chat</h3>
      <hr/>
      <div class="mb-3">
        <span style="font-size:15px;" for="exampleFormControlInput1" class="form-label">User Email</span>
        <input  type="email" class="form-control" name="email">
        <input  type="hidden" class="form-control" value="<?php echo $_SESSION['user'] ?>" name="doctor">
      </div>
       <div class="mb-3">
        <span style="font-size:15px;" for="exampleFormControlInput1" class="form-label">User Message</span>
        <textarea placeholder="Type message.." name="msg" required></textarea>
       </div>
      <div class="text-center">
          <button type="submit" class="btn  btn-dark btn-sm">Send</button>
          <button type="button" class="btn btn-danger btn-sm" onclick="closeForm()">Close</button>
      </div>
      
    </form>
  </div>

  <script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
   
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  </script>

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
