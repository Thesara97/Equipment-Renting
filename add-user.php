<?php

require_once('database/connection.php');
session_start();

if (!isset($_SESSION['adminid'])) {
    header('Location: index.php');
}

$select_all_users = "SELECT * FROM `user` ORDER BY userid DESC";
$select_all_user_result = mysqli_query($con, $select_all_users);
$count_all_users = mysqli_num_rows($select_all_user_result);


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

    <title>Equipment LIBRARY - Add new user</title>
  </head>
  <body>

    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-10 mx-auto">
               
            <div class="card ">
                    <div class="card-header">
                        <a class="btn btn-info btn-sm" href="dashboard.php" role="button"> Back </a> 
                        <span>Add new user</span>
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
                            <form method="POST" action="add-user-query.php">
                            <span> <strong> ADD NEW USER - User Details </strong> </span>
                            
                                <div class="row mt-3">
                                    
                                    <div class="col">
                                    <input type="text" class="form-control" name="name" placeholder="Full name" required>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="nic" placeholder="NIC" required>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                    </div>
                                    <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block" name="adduser">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      
                      </div>

                      <div class="row mt-4">

                        <div class="col-12">

                            <table class="table" >
                                <thead class="thead-dark">
                                    <tr>                               
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">NIC</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($count_all_users > 0){
                                        while($row_all_users = mysqli_fetch_assoc($select_all_user_result)){
                                            ?>
                                            <tr>                                   
                                                <td><?php echo $row_all_users['name']; ?></td>
                                                <td><?php echo $row_all_users['mobile']; ?></td>
                                                <td><?php echo $row_all_users['address']; ?></td>
                                                <td><?php echo $row_all_users['nic']; ?></td>
                                                
                                                <td align="center"> <a class="btn btn-danger btn-sm" href="delete-user.php?id=<?php echo $row_all_users['userid']; ?>" role="button">X</a> </td>
                                            </tr>
                                            <?php
                                        }
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