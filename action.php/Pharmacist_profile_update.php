 <?php
    include './db.php';
    $id = $_POST["id"];
    $Number  = $_POST["Number"];
    $Address  = $_POST["Address"];
    $FullName  = $_POST["FullName"];

    $sql = "UPDATE pharmacist SET name='$FullName',location='$Address',mobileNo='$Number' WHERE userName ='$id'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=pharmacist_Profile.php&title=Profile Updating Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=pharmacist_Profile.php&title=Profile Updating Not Success';
                </script>";
                
        }
?>