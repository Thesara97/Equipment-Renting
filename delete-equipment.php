<?php

require_once('database/connection.php');

$equipmentid = $_GET['id'];

$delete_equipment = "DELETE FROM equipment WHERE id='$equipmentid'";

if (mysqli_query($con, $delete_equipment)) {

    header('Location: add-equipment.php');

} 


?>