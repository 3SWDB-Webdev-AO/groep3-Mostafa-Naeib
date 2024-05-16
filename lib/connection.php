<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixelplayground.sql";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// connectie maken met de database anders error

$sql = "select * from gebruikers";
if($resultaat = $conn->query($sql)) {
    while ($row = $resultaat->fetch_row()) {
        echo "Good connection";
    }
} else {
    echo "Connection failed";
}
$resultaat->close();
$conn->close();
// query uitvoeren en resultaat tonen anders error tonen
?>




<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

$conn = new PDO('localhost','root','','Mijn_Buuf');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>