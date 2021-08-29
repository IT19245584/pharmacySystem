<?php
  include './db.php';
 $id = $_REQUEST["id"];
 $img = $_REQUEST["img"];
 $sql2 = "DELETE FROM medicine where id =$id";
 if (mysqli_query($conn, $sql2)) {
   unlink('./upload/medicine/'.$img);
        echo "<script>
                    window.location.href='../successError.php?id=success&redirect=pharmacists_medicine.php&title=Medicine Delete Success';
                </script>";
 }else{
       echo "<script>
                    window.location.href='../successError.php?id=error&redirect=pharmacists_medicine.php&title=Medicine Delete Not Success';
                </script>";
  
 }
?>