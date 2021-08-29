<?php
    include './db.php';
    $id = $_REQUEST["id"];
    $sql = "UPDATE item_order SET status='Completed' WHERE orderId =$id";
        if (mysqli_query($conn, $sql)) {
        
                echo "<script>
                    window.location.href='../successError.php?id=success&redirect=pharmacist_Prescription_order.php&title=Order Completed';
                </script>";
            
        } else {
                echo "<script>
                    window.location.href='../successError.php?id=error&redirect=pharmacist_Prescription_order.php&title=Order Not Completed';
                </script>";
               
        }
?>