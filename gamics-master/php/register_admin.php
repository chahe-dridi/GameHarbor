<?php
// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $adminName = mysqli_real_escape_string($conn, $_POST["agent_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // You may want to add more validation and sanitization here

    // Validate the data
    if (empty($adminName) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert admin data into the 'admin' table
        $sql = "INSERT INTO admin (name, email, password) VALUES ('$adminName', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the login page
            header("Location: ../login_admin.html");
            exit(); // Make sure to exit to prevent further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
