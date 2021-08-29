<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="./assets/cute-alert-master/cute-alert.js"></script>
    <link rel="stylesheet" href="./assets/cute-alert-master/style.css"> 

</head>
<body style="background-color:white">
    <?php 
            $redirect=$_REQUEST["redirect"];
            $title=$_REQUEST["title"];
            if(isset($_GET['id']) AND $_GET['id']=='success'){
                           
                        echo "<script>  
                                     cuteAlert({
                                        type: 'success',
                                        title: '$title',
                                        message: '',
                                        buttonText: 'Okay'
                                    }).then(() => {
                                             window.location = './$redirect'
                                    })
                        </script>";
                
            }else {}
            
            if(isset($_GET['id']) AND $_GET['id']=='error'){
                        echo "<script>  
                                    cuteAlert({
                                    type: 'error',
                                    title: '$title',
                                    message: '',
                                    buttonText: 'Okay'
                                }).then(() => {
                                        window.location = './$redirect'
                                })
                        </script>";
            }else {}
    ?>
</body>
</html>