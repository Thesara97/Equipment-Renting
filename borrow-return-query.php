<?php

require_once('database/connection.php');

$borrowid    = $_GET['id'];


$select_borrow_data = "SELECT * FROM `borrowequipment` WHERE id = '$borrowid'";
$select_borrow_data_result = mysqli_query($con, $select_borrow_data);
$row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);

$equipmentid = $row_borrow_data['equipmentid'];
$userid = $row_borrow_data['userid'];

$update_bequipment = "UPDATE `borrowequipment` SET `status` = 'finish' WHERE `id` = '$borrowid'";

$update_equipment = "UPDATE `equipment` SET `status` = 'available' WHERE `id` = '$equipmentid'";
$update_result = mysqli_query($con, $update_equipment);


if (mysqli_query($con, $update_bequipment)) {
    // echo "New record created successfully";
  
    header('Location: borrow-history.php');

} else {
    echo "Error: " . $update_bequipment . "<br>" . mysqli_error($con);
}

?>