<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Suwahala</title>
    <link rel="icon" href="./img/tabLogo.png">
</head>
<body style="background:url('./img/bg.png');  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4 ">
                <div class="card border-0 shadow" >
                    <div class="card-body">
                        <center>
                            <h3 class="text-uppercase" >Pharmacist Profile</h3>
                        </center>
                        <br/>
                        <form action="./action.php/addPharmacistDetail.php"  method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pharmacy Name</label>
                                <input type="text" class="form-control" name="FullName" id="FullName" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" class="form-control" name="Address" id="Address" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" name="Number" id="Number" >
                            </div>
                            <div class="mb-3">
                                <span for="exampleFormControlInput1" class="form-label">Image</span><br/>
                                <input type="file" name="image">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark btn-sm" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>