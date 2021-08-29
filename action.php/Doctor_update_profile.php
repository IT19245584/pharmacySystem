<?php
    include './db.php';
    $id = $_POST["id"];
    $Address = $_POST["Address"];
    $Number = $_POST["Number"];
    $Specialist = $_POST["Specialist"];
    $Hospital = $_POST["Hospital"];
    $sql = "UPDATE doctor SET address='$Address',address='$Address',mobileNo='$Number',specialist='$Specialist',hospital='$Hospital' WHERE userName ='$id'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Doctor_Profile.php&title=Details Updating Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Doctor_Profile.php&title=Details Updating Not Success';
                </script>";
        }
?>