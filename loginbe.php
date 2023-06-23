<?php

// Include the connection file
require 'connection.php';
require 'functions.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Create a new database connection
  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check if the connection is successful
  if (!$con) {
    die("Failed to connect to the database!");
  }

  // Prepare the SQL query to retrieve user data from the 'users' table
  $query = "SELECT * FROM users WHERE email = '$email'";

  // Execute the query
  $result = mysqli_query($con, $query);

  // Check if the login is successful
  if (mysqli_num_rows($result) == 1) {
    // Retrieve the hashed password from the database
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
      // Password is correct
      session_start();
      $_SESSION['user_id'] = $row['user_id'];
      header("Location: startprojects.php");
      exit();
    } else {
      // Password is incorrect
      echo "Login failed!";
    }
  } else {
    // User not found
    echo "Login failed!";
  }

  // Close the database connection
  mysqli_close($con);
}

?>

