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
        $query = "SELECT * FROM `invoices`";  
        $result = mysqli_query($data->con, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            $array[] = $row['amount'];  
        }  
        return array_sum($array);
    }
}

?>




        