<?php
    include './db.php';
    $id = $_REQUEST["id"];
    $value = $_REQUEST["value"];
    $sql = "UPDATE appointment SET status='$value' WHERE id =$id";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Doctor.php&title=You Accept Appointment';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Doctor.php&title=You Not Accept Appointment';
                </script>";
               
        }
?>