<?php
// Start the session
session_start();

// Include the database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $agentId = mysqli_real_escape_string($conn, $_POST["agent_id"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Validate the data
    if (empty($agentId) || empty($password)) {
        echo "Agent ID and password are required.";
    } else {
        // Retrieve the hashed password and agent_name from the database
        $sql = "SELECT agent_id, agent_name, password FROM publicity_agents WHERE agent_id = '$agentId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $agentName = $row['agent_name'];
            $hashedPassword = $row['password'];
          

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Set session variables
                $_SESSION['agent_id'] = $agentId;
                $_SESSION['agent_name'] = $agentName;

                // Redirect to a secure page or perform other actions
                header("Location: agent.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Agent not found.";
        }
    }
}

// Close the database connection
$conn->close();
?>
