<?php

require_once('database/connection.php');

$borrowid    = $_POST['fee'];

$update_fee = "UPDATE `settings` SET `paneltyfee` = '$borrowid' WHERE `id` = '1'";

if (mysqli_query($con, $update_fee)) {
    // echo "New record created successfully";
  
    header('Location: dashboard.php');

} else {
    echo "Error: " . $update_fee . "<br>" . mysqli_error($con);
}

?>