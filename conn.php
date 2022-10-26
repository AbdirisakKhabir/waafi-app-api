<?php
    //to show the errors of Your app
    // ini_set('display_errors', '1');
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "waafi_app";

    $connection = mysqli_connect($host, $username, $password, $database);
    if(!$connection){
        die('Disconnection Occured' . mysqli_connect_error());
    }else {
    //    echo "Successfull";
    }
   
?>