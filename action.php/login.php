<?php
    session_start();
    include './db.php';
    $email = $_POST["Email"];
    $Password = $_POST["Password"];
    $sql1 = "SELECT * from user WHERE name='$email' and password='$Password'";
    if (mysqli_query($conn, $sql1)) {
          $sql1 = "SELECT * from user WHERE name='$email' and password='$Password'";
          $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0) {
              // output data of each row
              while ($row = $result1->fetch_assoc()) {
                $accessType = $row['userType'];
                $_SESSION['user']=$email;
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=$accessType.php&title=Login Success';
                </script>";
                 }
             } else {}
       
        } else {
        echo "<script>
            window.location.href='../successError.php?id=error&redirect=index.php&title=Login Not Success';
        </script>";
}
?>