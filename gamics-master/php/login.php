<?php
// Start the session
session_start();

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
        // Retrieve the hashed password, username, and client_id from the database
        $sql = "SELECT client_id, client_name, password FROM clients WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $client_id = $row['client_id'];
            $hashedPassword = $row['password'];
            $username = $row['client_name'];

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Set session variables
                $_SESSION['client_id'] = $client_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                // Redirect to a secure page or perform other actions
                header("Location: client.html");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    }
}

// Close the database connection
$conn->close();
?>
