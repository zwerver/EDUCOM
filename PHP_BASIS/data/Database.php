<?php
function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_basis";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return;
    }
    return $conn;
}