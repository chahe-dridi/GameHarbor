<?php
// ... (your existing PHP code)
 
// Include the database connection file
include 'connect.php';

// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['agent_id'])) {
    header("Location: login_agent.php");
    exit();
}
$agentId = $_SESSION['agent_id'];

 
 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nameVideo = mysqli_real_escape_string($conn, $_POST["name_video"]);
    $coins = mysqli_real_escape_string($conn, $_POST["coins"]);

    // Handle file upload
    $targetDirectory = "C:/xampp/htdocs/GameHarbor/GameHarbor/gamics-master/assets/videos/"; // Change this to your desired directory
    $targetFile = $targetDirectory . basename($_FILES["video_file"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust the limit as needed)
    if ($_FILES["video_file"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain video file formats (you can adjust or extend this list)
    if (!in_array($videoFileType, array("mp4", "avi", "mkv", "mov"))) {
        echo "Sorry, only MP4, AVI, MKV, and MOV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the file to the target directory
        if (move_uploaded_file($_FILES["video_file"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now you can insert the data into the database
            $sql = "INSERT INTO videos (agent_id,name_video, coins) VALUES ('$agentId','$nameVideo', '$coins')";
            if ($conn->query($sql) === TRUE) {
                header("Location: agent.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// ... (rest of your PHP code)
?>
