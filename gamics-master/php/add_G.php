<?php
// Include the database connection file
include 'connect.php';


session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $adminid = $_SESSION['admin_id'];
    $gameName = $_POST['game_name'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $picture1= $_POST['picture'];
 
    // Handle the uploaded image
    $picture = $_FILES['picture'];
    
    // Check if an image is selected
    if ($picture['error'] == 0) {
        // Specify the target directory to upload the image
        $targetDir = "C:/xampp/htdocs/GameHarbor/GameHarbor/gamics-master/assets/images/games/";

        // Generate a unique filename for the uploaded image
        
  // Use the original filename for the target file
$targetFile = $targetDir . basename($picture['name']);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($picture['tmp_name'], $targetFile)) {
            // Image uploaded successfully

            // TODO: Perform database insertion with other form data and $targetFile as the image filename

            // Example: Insert data into 'games' table
            $sql = "INSERT INTO games (id_admin,game_name, description, genre, price, picture) VALUES ('$adminid','$gameName', '$description', '$genre', '$price', '$picture1')";

            if ($conn->query($sql) === TRUE) {
                // Record inserted successfully
                header("Location: admin.php");
            } else {
                // Error inserting record
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Failed to move the uploaded file
            echo "Error uploading file";
        }
    } else {
        // No image selected
        echo "Please select an image";
    }

    // Close the database connection
   
}
?>
