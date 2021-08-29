<?php
    include './db.php';
    $id = $_POST["id"];
    $MedicineName  = $_POST["MedicineName"];
    $medicineTypes  = $_POST["medicineTypes"];
    $price  = $_POST["price"];

    $sql = "UPDATE medicine SET name='$MedicineName',type='$medicineTypes',price='$price' WHERE id =$id";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=pharmacists_medicine.php&title=Details Updating Success';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=pharmacists_medicine.php&title=Details Updating Not Success';
                </script>";
                // echo $sql;
        }
?>