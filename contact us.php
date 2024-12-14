<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "BazarOman"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL query to insert the data into the feedback table
    $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $message); // Bind parameters
        if ($stmt->execute()) {
            echo "Feedback submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
