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
            <?php
            include './action.php/db.php';
            $id = $_REQUEST["id"];
            $sql = "select * from pharmacist where id = $id";            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
              <div class="card">
                <div class="card-body">
                    <center>
                            <h3 class="text-uppercase" >PHARMACIST  Profile</h3>
                        </center>
                        <br/>
                        <form action="./action.php/admin_Pharmacist_update.php"  method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" value="<?php echo $row['userName']?>" disabled />
                                <small id="emailResult" class=" validation-text"></small>
                            </div>
                            <hr/>
                            <br/>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pharmacy Name</label>
                                <input type="text" class="form-control" name="FullName" disabled value="<?php echo $row['name']?>" id="FullName" >
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id?>"  />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" class="form-control" name="Address"  value="<?php echo $row['location']?>" id="Address" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" name="Number"  value="<?php echo $row['mobileNo']?>" id="Number" >
                            </div>
                            <div class="d-grid gap-2 text-right">
                                <button class="btn btn-dark btn-sm" id="register" type="submit" type="submit">Update</button>
                                <a href="./Admin.php" >
                                 <button class="btn btn-outline-dark btn-sm"  type="button">Back</button>
                                </a>
                            </div>
                        </form>
                </div>
              </div>
               <?php
                      }
                } else {}
              ?>
            </div>
            <div class="col-sm-2">
            </div>
          </div>
      </div>
    </div>
  </div>
 <script>
        function emailValidation() {
            var email = document.getElementById("email").value;
            var re = /\S+@\S+\.\S+/;
            if (re.test(email) == true) {
                document.getElementById("emailResult").innerHTML = "Valid Email";
                document.getElementById("emailResult").style.color = "green";
            } else {
                document.getElementById("emailResult").innerHTML = "Invalid Email.";
                document.getElementById("emailResult").style.color = "red";
            }
        }

       function PasswordResultValidation() {
            var ReTypePassword = document.getElementById("ReTypePassword").value;
            var password = document.getElementById("password").value;

            if (ReTypePassword == password) {
                document.getElementById("passwordResult").innerHTML = "Passwords Are Matching";
                document.getElementById("passwordResult").style.color = "green";
                document.getElementById("register").disabled=false;
               
                
            } else {
                document.getElementById("passwordResult").innerHTML = "Passwords Are Not Matching";
                document.getElementById("passwordResult").style.color = "red";
                document.getElementById("register").disabled=true;
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
                document.getElementById("register").disabled=true;
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                    document.getElementById("register").disabled=true;
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                    document.getElementById("register").disabled=true;
                }
            }
        }
    </script>
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
