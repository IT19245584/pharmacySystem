<?php
    include './db.php';
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $Description = $_POST["Description"];

    $sql = "UPDATE labtest SET name='$name',price='$price',Description='$Description' WHERE id ='$id'";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_LabTest.php&title=Details Updating Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_LabTest.php&title=Details Updating Not Success';
                </script>";
        }
?>