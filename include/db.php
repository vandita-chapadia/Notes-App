<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "notes";
    
    $conn = mysqli_connect( $server_name, $username, $password,  $db_name);

    if(! $conn){
        echo "Connection failed". mysqli_connect_error();
    }
    /*else{
        echo "Success";
    }
    */
?>
