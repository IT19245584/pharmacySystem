<?php
    include './db.php';
    $FullName = $_POST["FullName"];
    $Address = $_POST["Address"];
    $Number = $_POST["Number"];
    $email = $_POST['email'];
    $ReTypePassword = $_POST['ReTypePassword'];

      $errors= array();
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
         move_uploaded_file($file_tmp,"upload/".$file_name);
        $sql1 = "INSERT INTO pharmacist(name,mobileNo,location,userName,imageName) VALUES('$FullName','$Number','$Address', '$email','$file_name') ";
        if (mysqli_query($conn, $sql1)) {

            $sql2 = "INSERT INTO user(name,	password, userType, status) VALUES('$email','$ReTypePassword', 'Pharmacist' ,'Pendding') ";
                if (mysqli_query($conn, $sql2)) {
                     echo "<script>
                             window.location.href='../successError.php?id=success&redirect=Admin_ViewPharamacist.php&title=Registration Success';
                     </script>";
                }else{
                    echo "<script>
                         window.location.href='../successError.php?id=error&redirect=Admin_ViewPharamacist.php&title=Registration Not Success';
                    </script>";
                }
            } else {
            echo "<script>
                window.location.href='../successError.php?id=error&redirect=Admin_ViewPharamacist.php&title=Registration Not Success';
            </script>";
            }

    }else{
                echo "<script>
                        alert('Can not Upload. Error : $errors');
                        </script>";
            
    }
?>