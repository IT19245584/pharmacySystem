<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Suwahala</title>
    <link rel="icon" href="./img/tabLogo.png">
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
                        <center>
                            <img src="./img/user.gif" width="80%"/>
                        </center>
                        <form action="./action.php/login.php" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="Email" id="Email" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" oninput="buttonEnable()" name="Password" id="Password" >
                            </div>
                            <div class="d-grid gap-2">
                                <button disabled="true" id="login" name="login" class="btn btn-dark btn-sm" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="text-end">
                            <a href="registration.php"  class="text-decoration-none"><small class="text-muted">Registration</small></a>&nbsp;&nbsp;&nbsp;
                            <a href="passwordReset.php"  class="text-decoration-none"><small class="text-muted">Password Reset</small></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function buttonEnable(){
           
            var email = document.getElementById("Email").value;
            var Password = document.getElementById("Password").value;

            if((email.length>4)&&(Password.length>4)){
                    document.getElementById("login").disabled=false;
                }else{
                    document.getElementById("login").disabled=true;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>