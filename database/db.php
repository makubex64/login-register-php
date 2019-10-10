<?php
// Create connection
$conn = mysqli_connect(
	'localhost',
	'root',
	'',
	'loginsystem'

);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

// Check connection
// otro metodo de probar la conexión
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";