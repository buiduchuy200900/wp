<?php   
$servername = "localhost";
$username = "root";
$password = "root";
$port = "8889";
$dbName = "myDB";

// /Create connection
$conn = new mysqli("$servername:$port", $username, $password, $dbName);


// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>