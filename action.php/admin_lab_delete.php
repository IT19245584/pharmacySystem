<?php
  include './db.php';
 $id = $_REQUEST["id"];
 $img = $_REQUEST["img"];
 $sql2 = "DELETE FROM labtest where id =$id";
 if (mysqli_query($conn, $sql2)) {
     unlink('./upload/lab/'.$img);
        echo "<script>
                    window.location.href='../successError.php?id=success&redirect=Admin_LabTest.php&title=Delete Success';
                </script>";
 }else{
       echo "<script>
                    window.location.href='../successError.php?id=error&redirect=Admin_LabTest.php&title=Delete Not Success';
                </script>";
 }
?>