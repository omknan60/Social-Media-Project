<?php

$fname = $sname = $date = $month = $year = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $sname = test_input($_POST["sname"]);
    $date = test_input($_POST["iddate"]);
    $month = test_input($_POST["idmonth"]);
    $year = test_input($_POST["idyear"]);
    $password = test_input($_POST["password"]);
    $email  = test_input($_POST["email"]);
  }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users(fname, sname, passwd, dd, mm, yy) VALUES ($fname, $sname, $password, $date, $month, $year)"

if ($conn->query($sql) === TRUE) {
  header("Location: yousigned.html");
}

$conn->close();

?>