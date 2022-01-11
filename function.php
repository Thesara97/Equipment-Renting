<?php

include('database/connection.php');

class Functions{

    public function total_count($table_name){

        $data = new Databases;
        $array = array();
        $query = "SELECT * FROM $table_name";
        $result = mysqli_query($data->con, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $array[] = $row;
        }
        return count($array);
    }

    public function total_amout(){

        $data = new Databases;
        $array = array();
        $query = "SELECT * FROM invoices";
        $result = mysqli_query($data->con, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $array[] = $row['amount'];
        }
        $panelty = array_sum($array);


        $get_panelty = "SELECT * FROM settings WHERE id = '1'";
        $result_getpanelty = mysqli_query($data->con, $get_panelty);
        $row_gellpanelty = mysqli_fetch_assoc($result_getpanelty);

        $panelty += $row_gellpanelty['totalpanelty'];

        return $panelty;
    }

    public function total_panelty($newfee){

        $data = new Databases;

        $get_panelty = "SELECT * FROM settings WHERE id = '1'";
        $result_getpanelty = mysqli_query($data->con, $get_panelty);
        $row_gellpanelty = mysqli_fetch_assoc($result_getpanelty);

        $update_fee = "UPDATE settings SET currentpanelty ='$newfee' WHERE id = 1";

        if($data->con->query($update_fee) === true){
            return $newfee;
        } else{
            echo "ERROR: Could not able to execute $update_fee. " . $data->con->error;
            return $newfee;
        }

        return $newfee;

    }
}

?>