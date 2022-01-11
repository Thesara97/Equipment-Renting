<?php

include('database/connection.php');
$data = new Databases;

$borrowid    = $_GET['id'];


$select_borrow_data = "SELECT * FROM borrowequipment WHERE id = '$borrowid'";
$select_borrow_data_result = mysqli_query($data->con, $select_borrow_data);
$row_borrow_data = mysqli_fetch_assoc($select_borrow_data_result);

$equipmentid = $row_borrow_data['equipmentid'];
$userid = $row_borrow_data['userid'];

$update_bequipment = "UPDATE borrowequipment SET status = 'finish' WHERE id = '$borrowid'";

$update_equipment = "UPDATE equipment SET status = 'available' WHERE id = '$equipmentid'";
$update_result = mysqli_query($data->con, $update_equipment);


if($data->con->query($update_bequipment) === true){


        $get_panelty = "SELECT * FROM settings WHERE id = '1'";
        $result_getpanelty = mysqli_query($data->con, $get_panelty);
        $row_gellpanelty = mysqli_fetch_assoc($result_getpanelty);

        $newnewfee = ($row_gellpanelty['currentpanelty'] + $row_gellpanelty['totalpanelty']);

        $update_fee = "UPDATE settings SET totalpanelty ='$newnewfee' , currentpanelty ='0' WHERE id = 1";

        if($data->con->query($update_fee) === true){
            //echo "New record created successfully";
            header('Location: borrow-history.php');
        } else{
            echo "ERROR: Could not able to execute $update_fee. " . $data->con->error;

        }

} else{
    echo "ERROR: Could not able to execute $update_bequipment. " . $data->con->error;
}

?>