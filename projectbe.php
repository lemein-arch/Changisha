<?php
require 'connection.php';
require 'functions.php';

// Check if the user is logged in
check_login($con);

// Retrieve the user_id of the logged-in user
$user_id = $_SESSION['user_id']; 

// Fetch the name of the logged-in user from the users table
$nameQuery = "SELECT name FROM users WHERE user_id = $user_id";
$result = mysqli_query($con, $nameQuery);

// Check if the query executed successfully and fetch the name
if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $clientName = $row['name'];
} else {
  // Handle the case where the user's name couldn't be retrieved
  $clientName = "Unknown";
}
// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $projectName = $_POST['projectName'];
  $description = $_POST['description'];
  $fundingGoal = $_POST['fundingGoal'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $currentFunds = $_POST['currentFunds'];

  // Process the file upload (project image)
  $targetDirectory = "images/";
  $targetFile = $targetDirectory . basename($_FILES['projectImage']['name']);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // You can perform additional validation and checks on the form data

  // Insert the data into the database
  // Assuming you have a "projects" table with appropriate columns
  $query = "INSERT INTO projects (p_name, p_description, clientname, pledge, start_date, end_date, current_amount, projectImage, client_id) 
  VALUES ('$projectName', '$description', '$clientName' , $fundingGoal, '$startDate', '$endDate', $currentFunds,  '$targetFile', '$user_id')";
  // Execute the query
  if (mysqli_query($con, $query)) {
    // Success! Redirect to a success page or do something else
    header("Location: projects.php");
    exit();
  } else {
    // Error occurred while inserting data into the database
    // You can handle the error as per your requirements
    echo "Error: " . mysqli_error($con);
  }
}
?>
