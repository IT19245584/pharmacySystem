<?php
    session_start();
    include './db.php';
    $id = $_POST["id"];
    $testDate = $_POST["testDate"];
    $_SESSION['testid'] = $id;

    $sql = "UPDATE labtestrequest SET status='Check',testDate='$testDate' WHERE id ='$id'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_LabTest.php&title=Status Updated';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_request_LabTest.php&title=Status Not Updated';
                </script>";
        }
?>