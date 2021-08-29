<?php
  include './db.php';
 $id = $_REQUEST["id"];
 $sql2 = "DELETE FROM doctor where id =$id";
 if (mysqli_query($conn, $sql2)) {
        echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin.php&title=Delete Success';
                </script>";
 }else{
       echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin.php&title=Delete Not Success';
                </script>";
 }
?>