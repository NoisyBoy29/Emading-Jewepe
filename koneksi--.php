<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_mading";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn){
    echo "DB Connected";
} else{
    echo "Connection Error";
}