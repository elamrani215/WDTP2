<?php

$connex = mysqli_connect('127.0.0.1', 'root', '', 'college_forum', '3306');

if (mysqli_connect_error()){
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    exit();
}

?>