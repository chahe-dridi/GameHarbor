<?php

// Read the JSON file containing the results
$jsonFilePath = 'results.json';
$jsonData = file_get_contents($jsonFilePath);

// Decode the JSON data
$results = json_decode($jsonData, true); // Set the second parameter to true to get an associative array

// Access the results as needed
foreach ($results as $key => $value) {
    echo "$key: $value<br>";
}

?>
