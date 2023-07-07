<?php

$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$phoneNumber = filter_input(INPUT_POST, "phoneNumber", FILTER_VALIDATE_INT);
$message = isset($_POST["message"]) ? $_POST["message"] : "";

$host = "localhost";
$dbname = "db_message";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
  die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO send_message (firstName, lastname, email, phoneNumber, message) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)){
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssis", $firstName, $lastName, $email, $phoneNumber, $message);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>




