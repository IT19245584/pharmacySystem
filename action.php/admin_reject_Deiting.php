 <?php
     include './db.php';
     $id = $_REQUEST["id"];

     $sql = "UPDATE dietingplan SET status='Reject' WHERE id ='$id'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_Deiting.php&title=Reject Plan';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_Deiting.php&title=There is an error';
                </script>";
        }
?>