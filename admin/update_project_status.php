<?php
require '../connection.php';

// Get the project ID from the AJAX request
$projectId = $_POST['projectId'];

// Create a new database connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if the connection is successful
if (!$con) {
  die("Failed to connect to the database!");
}

// Update the p_active column for the specified project
$query = "UPDATE projects SET p_active = 1 WHERE p_id = $projectId";
$result = mysqli_query($con, $query);

// Check if the update was successful
if ($result) {
  echo "success";
} else {
  echo "failure";
}

// Close the database connection
mysqli_close($con);
?>
