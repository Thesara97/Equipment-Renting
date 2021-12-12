<?php

require_once('database/connection.php');
session_start();

if (!isset($_SESSION['adminid'])) {
    header('Location: index.php');
}

if (!isset($_GET['borrowid'])) {
    header('Location: borrow-equipment.php');
}

$borrowid = $_GET['borrowid'];

$select_borrow_data = "SELECT * FROM `borrowequipment` WHERE id = '$borrowid'";
$select_borrow_data_result = mysqli_query($con, $select_borrow_data);
$row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);

$equipmentid = $row_borrow_data['equipmentid'];
$userid = $row_borrow_data['userid'];
$returndate = $row_borrow_data['returndate'];


$select_all_equipment = "SELECT * FROM `equipment` WHERE id = '$equipmentid' ORDER BY id DESC LIMIT 1";
$select_all_equipment_result = mysqli_query($con, $select_all_equipment);
$row_equipments = mysqli_fetch_assoc($select_all_equipment_result);

$equipment_title = $row_equipments['equipment'];
$equipment_price = $row_equipments['price'];
$equipment_category = $row_equipments['category'];


$select_all_users = "SELECT * FROM `user` WHERE userid = '$userid' ORDER BY userid DESC LIMIT 1";
$select_all_user_result = mysqli_query($con, $select_all_users);
$row_users = mysqli_fetch_assoc($select_all_user_result);

$user_name = $row_users['name'];
$user_mobile = $row_users['mobile'];
$user_nic = $row_users['nic'];


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

    <title>EQUIPMENT LIBRARY - Borrow Equipment</title>
  </head>
  <body>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-10 mx-auto">
               
            <div class="card ">
                    <div class="card-header">
                        <a class="btn btn-info btn-sm" href="dashboard.php" role="button"> Back </a> 
                        <span>Borrow Equipment</span>
                        <a class="btn btn-danger" href="logout.php" role="button" style="float: right; margin-left:5px;">LOGOUT</a> 
                        <a class="btn btn-dark" href="settings.php" role="button" style="float: right;">Settings</a> 
                    </div>
                    <div class="card-body">
                  
                      <div class="row text-center mt-2">
                          
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-equipment.php" role="button">Borrow Equipment</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="add-user.php" role="button">Add new user</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-history.php" role="button">Borrow history</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-warning btn-block" href="add-equipment.php" role="button">Add new Equipment</a> </div>
               
                      </div>
                      <hr>
                      <div class="row">
                       
                        <div class="col-12">
                            <form method="POST" action="borrow-equipment-query-finish.php">
                            <span> <strong> Equipment Details </strong> </span>
                            
                                <div class="row mt-3">
                                    
                                  
                                    <div class="col">
                                       <h2> <?php echo $equipment_title; ?> <span class="badge badge-secondary"> <?php echo $equipment_category; ?> </span> </h2> 
                                       
                                       <h1> <?php echo "Rs. ".$equipment_price.".00"; ?> </h1>
                                    </div>

                                    <div class="col">
                                       <h2> <?php echo $user_name; ?>  </h2>                                        
                                       <h4> <?php echo $user_nic; ?> </h4>
                                       <h4> <?php echo $user_mobile; ?> </h4>
                                    </div>

                                    <div class="col">
                                        <H5>Return Date</H5>
                                       <h2> <?php echo $returndate; ?>  </h2>                                        
                                      
                                    </div>

                                    <input type="hidden" name="borrowid" value="<?php echo $borrowid; ?>">
                                    <input type="hidden" name="equipmentid" value="<?php echo $equipmentid; ?>">
                                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                    <input type="hidden" name="equipment_price" value="<?php echo $equipment_price; ?>">

                                    <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block" name="borrow" >BORROW</button>
                                    </div>
                                </div>
                            </form>
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