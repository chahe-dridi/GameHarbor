<?php
// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // You may want to add more validation and sanitization here

    // Validate the data
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the 'clients' table
        $sql = "INSERT INTO clients (client_name, email, password, registration_date) VALUES ('$username', '$email', '$hashedPassword', NOW())";

        if ($conn->query($sql) === TRUE) {
           // Redirect to the home page
           header("Location: ../login.html");
            exit(); // Make sure to exit to prevent further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
