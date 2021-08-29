 <?php
     include './db.php';
     $password = $_POST["ReTypePassword"];
     $email  = $_POST["email"];
     $sql = "UPDATE user SET password='$password' WHERE name ='$email'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=index.php&title=Password Reset Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=passwordReset.php&title=Password Reset Not Success';
                </script>";
        }
?>