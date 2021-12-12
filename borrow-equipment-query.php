<?php

require_once('database/connection.php');

$equipment  = $_POST['equipment'];
$user       = $_POST['user'];
$return     = $_POST['returndate'];

$today = date('Y-m-d');

$insert_bequipment = "INSERT INTO `borrowequipment`(`equipmentid`, `userid`, `issuedate`, `returndate`) VALUES ('$equipment','$user','$today','$return')";

if (mysqli_query($con, $insert_bequipment)) {
    // echo "New record created successfully";
    $last_id = mysqli_insert_id($con);
    header('Location: borrow-equipment-finish.php?borrowid='.$last_id);

} else {
    echo "Error: " . $insert_bequipment . "<br>" . mysqli_error($con);
}

?>