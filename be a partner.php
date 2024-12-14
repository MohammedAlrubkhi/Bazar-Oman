<?php
// Database connection
$servername = "localhost";  // Your server (usually localhost)
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password (empty by default for local MySQL)
$dbname = "BazarOman";          // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize the input data
$names = mysqli_real_escape_string($conn, $_POST['name']);
$shopName = mysqli_real_escape_string($conn, $_POST['shop-name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// SQL query to insert the data into the partners table
$sql = "INSERT INTO partners (names, shopName, email) VALUES ('$names', '$shopName', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Your application to become a partner has been submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
