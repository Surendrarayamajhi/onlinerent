<?php
    $conn = mysqli_connect("localhost", "root","","myrent_db");

    if($conn){
        // echo "Success DB Connection!";
    }else{
        echo die("Failed").mysqli_connect_error();
    }
