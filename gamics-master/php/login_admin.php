<?php
// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // You may want to add more validation and sanitization here

    // Validate the data
    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
    } else {
        // Retrieve admin data from the 'admin' table
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Admin found, verify the password
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Password is correct, set session variables and redirect to a dashboard or home page
                session_start();
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];

                header("Location: admin.php"); // Replace with the actual dashboard page
                exit(); // Make sure to exit to prevent further script execution
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Admin with this email does not exist.";
        }
    }
}

// Close the database connection
$conn->close();
?>
