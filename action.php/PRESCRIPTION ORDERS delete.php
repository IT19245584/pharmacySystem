<?php
 include './db.php';
 $id = $_REQUEST["id"];
 $sql2 = "DELETE FROM item_order where orderId =$id";
 if (mysqli_query($conn, $sql2)) {
        echo "<script>
                    window.location.href='../successError.php?id=success&redirect=pharmacist_Prescription_order.php&title=Delete Success';
                </script>";
 }else{
       echo "<script>
                    window.location.href='../successError.php?id=error&redirect=pharmacist_Prescription_order.php&title=Delete Not Success';
                </script>";
 }
?>