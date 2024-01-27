<?php
// Include the database connection file
include 'connect.php';

// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['client_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newUsername = mysqli_real_escape_string($conn, $_POST["username"]);
    $newEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $newCountry = mysqli_real_escape_string($conn, $_POST["country"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    // Validate the data
    if (empty($newUsername) || empty($newEmail) || empty($newCountry)) {
        echo "Username, email, and country are required.";
    } else {
        // You may want to add more validation and sanitization here

        // Check if the new password and confirm password match
        if ($newPassword != $confirmPassword) {
            echo "Password and confirm password do not match.";
        } else {
            // Update user data in the database
            $client_id = $_SESSION['client_id'];
            $updateSql = "UPDATE clients SET client_name = '$newUsername', email = '$newEmail', country = '$newCountry' WHERE client_id = $client_id";

            // Optionally, update the password if provided
            if (!empty($newPassword)) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE clients SET client_name = '$newUsername', email = '$newEmail', country = '$newCountry', password = '$hashedPassword' WHERE client_id = $client_id";
            }

            if ($conn->query($updateSql) === TRUE) {
                header("Location: profile.php");
                exit();
            } else {
                echo "Error updating profile: " . $conn->error;
            }
        }
    }
}

// Close the database connection
$conn->close();
?>