<?php

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin123"){
        $_SESSION['adminid'] = "1";
        header('Location: dashboard.php');
    }else{
        header('Location: index.php');
    }

}

?>
