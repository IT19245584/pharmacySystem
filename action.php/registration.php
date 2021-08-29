<?php
    session_start();
    include './db.php';
    $email = $_POST["email"];
    $ReTypePassword = $_POST["ReTypePassword"];
    $userType = $_POST["userType"];
    $_SESSION['email']=$email;

    $sql1 = "INSERT INTO user(name,	password, userType, status) VALUES('$email','$ReTypePassword', '$userType' ,'Pendding') ";
    if (mysqli_query($conn, $sql1)) {
        if($userType == 'Doctor'){
            echo "<script>
                window.location.href='../successError.php?id=success&redirect=DoctorRegistration.php&title=Account Registration Success';
            </script>";
        }else if($userType == 'Pharmacist'){
            echo "<script>
                window.location.href='../successError.php?id=success&redirect=PharmacistRegistration.php&title=Account Registration Success';
            </script>";
        }else{

        }
        
        } else {
        echo "<script>
            window.location.href='../successError.php?id=error&redirect=registration.php&title=Account Registration Not Success';
        </script>";
}
?>