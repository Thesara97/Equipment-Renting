<?php

include('database/connection.php');
$data = new Databases;

$name       = $_POST['name'];
$mobile     = $_POST['mobile'];
$nic        = $_POST['nic'];
$address    = $_POST['address'];

$insert_user = "INSERT INTO `user`(`name`, `mobile`, `address`, `nic`) VALUES ('$name','$mobile','$address','$nic')";
if($data->con->query($insert_user) === true){
    //echo "New record created successfully";
    header('Location: add-user.php');
} else{
    echo "ERROR: Could not able to execute $insert_user. " . $data->con->error;
}

?>