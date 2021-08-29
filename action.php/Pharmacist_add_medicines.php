<?php
    session_start();
    include './db.php';
    $MedicineName = $_POST["MedicineName"];
    $medicineTypes = $_POST["medicineTypes"];
    $price = $_POST["price"];
    $Pharmacist = $_SESSION['user'];

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
         move_uploaded_file($file_tmp,"upload/medicine/".$file_name);
    $sql1 = "INSERT INTO medicine(name,	type,	price,imageName,PharmacistId	) VALUES('$MedicineName','$medicineTypes','$price','$file_name','$Pharmacist') ";
    if (mysqli_query($conn, $sql1)) {
        echo "<script>
            window.location.href='../successError.php?id=success&redirect=pharmacists_medicine.php&title=Medicine Added';
            </script>";
        } else {
        echo "<script>
            window.location.href='../successError.php?id=error&redirect=pharmacists_medicine.php&title=Medicine Not Added';
        </script>";
        }
    }else{
                echo "<script>
                        alert('Can not Upload. Error : $errors');
                        </script>";
            
    }
?>