<?php
  include './db.php';
  $email = $_POST["email"];
  $msg = $_POST["msg"];
  $doctor = $_POST["doctor"];

    $sql2 = "INSERT INTO chat(dID,pID,message) VALUES('$doctor','$email', '$msg' )";
    if (mysqli_query($conn, $sql2)) {
         echo "<script>
                             window.location.href='../successError.php?id=success&redirect=Doctor.php&title=Message Sent';
                     </script>";  
    }else{
         echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Doctor.php&title==Message Not Sent';
                </script>";
    }

?>