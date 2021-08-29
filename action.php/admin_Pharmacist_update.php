<?php
    include './db.php';
    $id = $_POST["id"];
    $Address = $_POST["Address"];
    $Number = $_POST["Number"];

    $sql = "UPDATE pharmacist SET mobileNo='$Number',location='$Address' WHERE id =$id";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_ViewPharamacist.php&title=Details Updating Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_ViewPharamacist.php&title=Details Updating Not Success';
                </script>";
                // echo $sql;
        }
?>