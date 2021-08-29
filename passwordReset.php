<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Suwahala</title>
    <link rel="icon" href="./img/tabLogo.png">
    <style>
        
            .medium-password {
               color:goldenrod;
            }

            .weak-password {
              color:red;
            }

            .strong-password {
               color:green;
            }
    </style>
</head>
<body style="background:url('./img/bg.png');  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4 ">
                <div class="card border-0 shadow" >
                    <div class="card-body">
                        <!-- <center>
                            <img src="./img/user.gif" width="80%"/>
                        </center> -->
                        <form action="./action.php/updatePassword.php" method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                             <input type="email" class="form-control" oninput="emailValidation()" name="email" id="email" >
                            <small id="emailResult" class=" validation-text"></small>
                        </div>
                        <div class="mb-3">
                            <span for="exampleFormControlInput1" class="form-label">Password</span>
                            <input type="password" class="form-control"  onKeyUp="checkPasswordStrength();"  name="password" id="password">
                            <small id="password-strength-status"></small>
                        </div>
                        <div class="mb-3">
                            <span for="exampleFormControlInput1" class="form-label">Re-Type Password</span>
                            <input type="password" class="form-control" oninput="PasswordResultValidation()" name="ReTypePassword" id="ReTypePassword" >
                            <small id="passwordResult" class=" validation-text"></small>   
                        </div>
                        <div class="d-grid gap-2">
                             <button  class="btn btn-dark btn-sm" disabled="true" id="Reset"   type="submit">Password Reset</button>
                        </div>
                        </form>
                        <div class="text-end">
                            <a href="index.php" class="text-decoration-none"><small class="text-muted">Login</small></a>
                        </div>
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
                document.getElementById("Reset").disabled=true;
            } else {
                document.getElementById("emailResult").innerHTML = "Invalid Email.";
                document.getElementById("emailResult").style.color = "red";
                document.getElementById("Reset").disabled=true;
            }
        }

       function PasswordResultValidation() {
            var ReTypePassword = document.getElementById("ReTypePassword").value;
            var password = document.getElementById("password").value;

            if (ReTypePassword == password) {
                document.getElementById("passwordResult").innerHTML = "Passwords Are Matching";
                document.getElementById("passwordResult").style.color = "green";
                document.getElementById("Reset").disabled=false;
                
            } else {
                document.getElementById("passwordResult").innerHTML = "Passwords Are Not Matching";
                document.getElementById("passwordResult").style.color = "red";
                document.getElementById("Reset").disabled=true;
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
                document.getElementById("Reset").disabled=true;
                
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                    document.getElementById("Reset").disabled=true;
                    
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                    document.getElementById("Reset").disabled=true;
                   
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>