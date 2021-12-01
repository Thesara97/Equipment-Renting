<?php

require_once('database/connection.php');

$userid = $_GET['id'];

$delete_user = "DELETE FROM user WHERE userid='$userid'";

if (mysqli_query($con, $delete_user)) {

    header('Location: add-user.php');

} 


?>