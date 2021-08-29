<?php
  include './db.php';
  $errors= array();
      $id = $_REQUEST['id'];
      $strtotime = strtotime("now");
      $file_name = $strtotime.'_'.$_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $parts = explode('.', $_FILES['image']['name']);
      $file_ext=end($parts);
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"upload/dieting/".$file_name);
        $sql1 = "UPDATE dietingplan SET img ='$file_name', status='Sent' WHERE id ='$id'";
        if (mysqli_query($conn, $sql1)) {
            echo "<script>
                window.location.href='../successError.php?id=success&redirect=Admin_Deiting_sent.php&title=Dieting Plan Sent';
                </script>";
            } else {
            echo "<script>
                window.location.href='../successError.php?id=error&redirect=Admin_Deiting.php&title=Dieting Plan Not Sent';
            </script>";
            }
        }else{
                    echo "<script>
                            alert('Can not Upload. Error : $errors');
                            </script>";
                
        }
?>