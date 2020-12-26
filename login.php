<?php

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email  = test_input($_POST["email"]);    
    $password = test_inptu($_POST["password"]);
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

$db = mysqli_select_db($conn, "users");

$query = mysqli_query("SELECT * FROM users WHERE pass = '$password' AND email = '$email'");

$rows = mysqli_num_rows($query);

if ($rows == 1) {
  header("Location: welcome.html");
}

$conn->close();

?>