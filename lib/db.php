<?php
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $database = "pixelplayground";
$conn = new mysqli('localhost', 'root', '', 'pixelplayground');
        
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

?>