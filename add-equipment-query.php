<?php

require_once('database/connection.php');

$title       = $_POST['equipment'];
$author     = $_POST['manufacturer'];
$fee        = $_POST['fee'];
$category    = $_POST['category'];

$insert_equipment = "INSERT INTO `equipment`(`equipment`, `manufacturer`, `price`, `category`, `status`) VALUES ('$title','$manufacturer','$fee','$category','Available')";
if (mysqli_query($con, $insert_equipment)) {
    // echo "New record created successfully";
    header('Location: add-equipment.php');

} else {
    echo "Error: " . $insert_equipment . "<br>" . mysqli_error($con);
}

?>