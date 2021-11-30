<?php

require_once('database/connection.php');

$borrowid    = $_POST['borrowid'];
$equipmentid        = $_POST['equipmentid'];
$userid      = $_POST['userid'];
$equipment_price    = $_POST['equipment_price'];

$date = date('Y-m-d');

$update_bequipment = "UPDATE `borrowequipment` SET `status` = 'active' WHERE `id` = '$borrowid'";
$update_equipment = "UPDATE `equipment` SET `status` = 'notavailable' WHERE `id` = '$equipmentid'";
$update_result = mysqli_query($con, $update_equipment);

$insert_inoice = "INSERT INTO `invoices`(`borrowid`, `userid`, `amount`, `date`, `status`) VALUES ('$borrowid','$userid','$equipment_price','$date', 'paid')";
$insert_result = mysqli_query($con, $insert_inoice);

if (mysqli_query($con, $update_bequipment)) {
    // echo "New record created successfully";
  
    header('Location: borrow-success.php');

} else {
    echo "Error: " . $update_bequipment . "<br>" . mysqli_error($con);
}

?>