<?php

// Include the connection file
require '../connection.php';
require 'adminfunctions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $inputEmail = $_POST["Admin_email"];
  $inputPassword = $_POST["Admin_password"];

  // Create a new database connection
  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check if the connection is successful
  if (!$con) {
    die("Failed to connect to the database!");
  }

 
  $query = "SELECT * FROM access WHERE Admin_email = '$inputEmail'";
  $result = mysqli_query($con, $query);

  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $adminEmail = $row['Admin_email'];
    $adminPassword = $row['Admin_password'];

    //session_start();

    if ($inputPassword === $adminPassword) {
      // Password is correct
      $_SESSION['Admin_id'] = $row['admin_id']; 
      header("Location: dashboard.php");
      exit();
    } else {
      // Password is incorrect
      echo "Incorrect Password!";
    }
  } else {
    // Admin data not found
    echo "Admin data not found!";
  }

  // Close the database connection
  mysqli_close($con);
}

?>
