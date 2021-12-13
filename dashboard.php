<?php

session_start();

if (!isset($_SESSION['adminid'])) {
    header('Location: index.php');
}

include('function.php');
$func = new Functions;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-color.min.css" >

    <!-- Additional CSS -->
    <link rel="stylesheet" href="css/main.css" >

    <title>EQUIPMENT LIBRARY - Dashboard</title>
  </head>
  <body>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-10 mx-auto">
               
            <div class="card ">
                    <div class="card-header">
                        <span>Welcome - Equipment Renting Management System </span>
                        <a class="btn btn-danger" href="logout.php" role="button" style="float: right; margin-left:5px;">LOGOUT</a> 
                        <a class="btn btn-dark" href="settings.php" role="button" style="float: right;">Settings</a> 
                    </div>
                    <div class="card-body">
                        <img src="img/image-1.jpg" alt="" class="img-fluid">
                      <div class="row text-center mt-2">
                          
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-equipment.php" role="button">Borrow EQUIPMENT</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="add-user.php" role="button">Add new user</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-history.php" role="button">Borrow history</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-warning btn-block" href="add-equipment.php" role="button">Add new EQUIPMENT</a> </div>
               
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/equipment.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong>TOTAL EQUIPMENT</strong> </h5>
                                    <p class="card-text"><?php echo $func->total_count('equipment'); ?></p>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/user.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong>TOTAL <Br> USER'S</strong> </h5>
                                    <p class="card-text">  <?php echo $func->total_count('user'); ?></p>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                        <div class="col-md-4 col-12">

                        <div class="card border-dark  mb-3" style="max-width: 18rem;">
                         
                            <div class="card-body text-dark ">

                            <div class="row">
                                <div class="col-4">
                                    <img src="img/money.png" alt="equipment" class="img-fluid">
                                </div>
                                <dic class="col-8">
                                    <h5 class="card-title"> <strong> TOTAL <Br> EARN </strong> </h5>
                                    <p class="card-text">Rs <?php echo $func->total_amout(); ?>.00</p>
                                </dic>
                            </div>                                
                               
                            </div>
                        </div>

                        </div>

                      </div>

                      

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
