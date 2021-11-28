<?php

require_once('database/connection.php');

$name       = $_POST['name'];
$mobile     = $_POST['mobile'];
$nic        = $_POST['nic'];
$address    = $_POST['address'];

$insert_user = "INSERT INTO `user`(`name`, `mobile`, `address`, `nic`) VALUES ('$name','$mobile','$address','$nic')";
if (mysqli_query($con, $insert_user)) {
    // echo "New record created successfully";
    header('Location: add-user.php');

} else {
    echo "Error: " . $insert_user . "<br>" . mysqli_error($con);
}

?>