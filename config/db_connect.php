<?php
    //MySQLi not PDO
    // connect to database
    $conn  = mysqli_connect('localhost', 'pree', '12345678', 'ninja_pizza');

    // check connection

    if (!$conn) {
        echo 'connection error: ' . mysqli_connect_error();
    }
?>