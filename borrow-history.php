<?php

require_once('database/connection.php');
session_start();

if (!isset($_SESSION['adminid'])) {
    header('Location: index.php');
}

$select_borrow_data = "SELECT * FROM `borrowequipment` ORDER BY id DESC";
$select_borrow_data_result = mysqli_query($con, $select_borrow_data);



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

    <title>Equipment LIBRARY - Borrow History</title>
  </head>
  <body>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-10 mx-auto">
               
            <div class="card ">
                    <div class="card-header">
                        <a class="btn btn-info btn-sm" href="dashboard.php" role="button"> Back </a> 
                        <span>Borrow History</span>
                        <a class="btn btn-danger" href="logout.php" role="button" style="float: right; margin-left:5px;">LOGOUT</a> 
                        <a class="btn btn-dark" href="settings.php" role="button" style="float: right;">Settings</a> 
                    </div>
                    <div class="card-body">
                  
                      <div class="row text-center mt-2">
                          
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-equipment.php" role="button">Borrow EQUIPMENT</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="add-user.php" role="button">Add new user</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-success btn-block" href="borrow-history.php" role="button">Borrow history</a> </div>
                          <div class="col-md-3 col-6"> <a class="btn btn-warning btn-block" href="add-equipment.php" role="button">Add new EQUIPMENT</a> </div>
               
                      </div>
                      <hr>
                      <div class="row">
                       
                      <div class="col-12">

                            <table class="table" >
                                <thead class="thead-dark">
                                    <tr>                               
                                        <th scope="col">ID</th>
                                        <th scope="col">Equipment</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">NIC</th>
                                        <th scope="col">Issue Date</th>
                                        <th scope="col">Return date</th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        while($row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result)){

                                            $equipmentid  = $row_borrow_data['equipmentid'];

                                            $select_all_equipment = "SELECT * FROM `equipment` WHERE id = '$equipmentid' ORDER BY id DESC LIMIT 1";
                                            $select_all_equipment_result = mysqli_query($con, $select_all_equipment);
                                            $row_equipments = mysqli_fetch_assoc($select_all_equipment_result);

                                            $equipment_title = $row_equipments['equipment'];
                                          
                                            $userid = $row_borrow_data['userid'];

                                            $select_all_users = "SELECT * FROM `user` WHERE userid = '$userid' ORDER BY userid DESC LIMIT 1";
                                            $select_all_user_result = mysqli_query($con, $select_all_users);
                                            $row_users = mysqli_fetch_assoc($select_all_user_result);

                                            $user_name = $row_users['name'];                                      
                                            $user_nic = $row_users['nic'];

                                            ?>
                                            <tr>                                   
                                                <td><?php echo $row_borrow_data['id']; ?></td>
                                                <td><?php echo $equipment_title; ?></td>                                           
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $user_nic; ?></td>
                                                <td><?php echo $row_borrow_data['issuedate']; ?></td>
                                                <td><?php echo $row_borrow_data['returndate']; 
                                                
                                                $today = date('Y-m-d');
                                                $returnday = $row_borrow_data['returndate'];

                                                $datetime1 = strtotime($today);
                                                $datetime2 = strtotime($returnday);

                                                $calculate_seconds = $datetime2 - $datetime1;// == <seconds between the two times>
                                                $days = floor($calculate_seconds / (24 * 60 * 60 ));

                                                if($days < 0){
                                                    ?> <span class="badge badge-danger"> Due  </span> <?php
                                                    
                                                }else{
                                                    ?> <span class="badge badge-success"> Ongoing  </span> <?php
                                                }
 ?></td>
                                                <td> <?php
                                                
                                                if($row_borrow_data['status'] == 'finish'){
                                                    ?> <span class="badge badge-success"> Finish  </span> <?php
                                                    
                                                }else{
                                                    ?> <span class="badge badge-warning"> Active  </span> <?php
                                                }
                                                
                                                ?> </td>

                                                <?php
                                                 if($row_borrow_data['status'] != 'finish'){
                                                    ?> <td align="center"> <a class="btn btn-dark btn-sm" href="borrow-return.php?id=<?php echo $row_borrow_data['id']; ?>" role="button">Return</a> </td> <?php
                                                    
                                                }
                                                ?>
                                                
                                                
                                            </tr>
                                            <?php
                                        }
                                    
                                    ?>
                                    
                                
                                </tbody>
                            </table>

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