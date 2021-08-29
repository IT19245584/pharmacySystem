<?php
  include './db.php';
 $id = $_REQUEST["id"];
 $sql2 = "DELETE FROM pharmacist where id =$id";
 if (mysqli_query($conn, $sql2)) {
        echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_ViewPharamacist.php&title=Delete Success';
                </script>";
 }else{
       echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_ViewPharamacist.php&title=Delete Not Success';
                </script>";
 }
?>