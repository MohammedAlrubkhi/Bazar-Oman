<?php
// Establish a connection to the database
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "BazarOman";      // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define a class to represent a User
class User {
    public $firstName;
    public $lastName;
    public $email;
    public $password;

    // Constructor to initialize the user object
    public function __construct($firstName, $lastName, $email, $password) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    }

    // Function to save the user to the database
    public function save($conn) {
        $sql = "INSERT INTO users (firstName, lastName, email, pwd) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $this->firstName, $this->lastName, $this->email, $this->password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['Lasttname'];
    $email = $_POST['email'];
    $confirmEmail = $_POST['Conemail'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['Confirmpass'];

    // Validate the form
    if ($email !== $confirmEmail) {
        echo "Emails do not match!";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // Create a User object
        $user = new User($firstName, $lastName, $email, $password);

        // Try to save the user to the database
        if ($user->save($conn)) {
            echo "Signup successful!";
        } else {
            echo "Error: Could not save the user.";
        }
    }
}

$conn->close();
?>
