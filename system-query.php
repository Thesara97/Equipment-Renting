<?php

include('database/connection.php');
$data = new Databases;

$borrowid    = $_POST['fee'];

$update_fee = "UPDATE settings SET paneltyfee ='$borrowid' WHERE id = 1";

if($data->con->query($update_fee) === true){
    echo "Records were updated successfully.";
    header('Location: dashboard.php');
} else{
    echo "ERROR: Could not able to execute $update_fee. " . $data->con->error;
}

?>