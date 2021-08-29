<?php
    session_start();
    include './db.php';
    $FullName = $_POST["FullName"];
    $Address = $_POST["Address"];
    $Number = $_POST["Number"];
    $Specialist = $_POST["Specialist"];
    $Hospital = $_POST["Hospital"];
    $email = $_SESSION['email'];

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
        $sql1 = "INSERT INTO doctor(name,	address, mobileNo, specialist, userName,hospital, imageName) VALUES('$FullName','$Address', '$Number' ,'$Specialist' ,'$email','$Hospital','$file_name') ";
        if (mysqli_query($conn, $sql1)) {
            echo "<script>
                window.location.href='../successError.php?id=success&redirect=index.php&title=Registration Success';
                </script>";
            } else {
            echo "<script>
                window.location.href='../successError.php?id=error&redirect=DoctorRegistration.php&title=Registration Not Success';
            </script>";
            }
    }else{
                echo "<script>
                        alert('Can not Upload. Error : $errors');
                        </script>";
            
    }
?>