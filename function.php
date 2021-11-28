<?php

function total_equipment(){

    include('database/connection.php');
    $select_all_equipment = "SELECT * FROM `equipment`";
    $select_all_equipment_result = mysqli_query($con, $select_all_equipment);
    $total_equipment = mysqli_num_rows($select_all_equipment_result);
    return $total_equipment;
}

function total_user(){

    include('database/connection.php');
    $select_all_users = "SELECT * FROM `user`";
    $select_all_user_result = mysqli_query($con, $select_all_users);
    $count_all_users = mysqli_num_rows($select_all_user_result);

    return $count_all_users;
}


function total_amout(){

    include('database/connection.php');
    $select_all_equipment = "SELECT * FROM `invoices`";
    $select_all_equipment_result = mysqli_query($con, $select_all_equipment);

    $total = 0;

    while($row_amout = mysqli_fetch_assoc($select_all_equipment_result)){

        $free = $row_amout['amount'];

        $total = $total+$free;

    }

    return $total;
}


?>