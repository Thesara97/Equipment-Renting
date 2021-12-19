<?php

include('database/connection.php');
$data = new Databases;

$equipment      = $_POST['equipment'];
$manufacturer   = $_POST['manufacturer'];
$fee            = $_POST['fee'];
$category       = $_POST['category'];

$insert_equipment = "INSERT INTO `equipment`(`equipment`, `manufacturer`, `price`, `category`, `status`) VALUES ('$equipment','$manufacturer','$fee','$category','Available')";
if($data->con->query($insert_equipment) === true){
    //echo "New record created successfully";
    header('Location: add-equipment.php');
} else{
    echo "ERROR: Could not able to execute $insert_equipment. " . $data->con->error;
}
?>