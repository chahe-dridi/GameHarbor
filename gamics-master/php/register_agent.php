<?php
// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $agentName = mysqli_real_escape_string($conn, $_POST["agent_name"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // You may want to add more validation and sanitization here

    // Validate the data
    if (empty($agentName) || empty($password)) {
        echo "Agent name and password are required.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert agent data into the 'publicity_agents' table
        $sql = "INSERT INTO publicity_agents (agent_name, password, registration_date) VALUES ('$agentName', '$hashedPassword', NOW())";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the login page
            header("Location: ../login_agent.html");
            exit(); // Make sure to exit to prevent further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
