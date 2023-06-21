<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Database connection parameters
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "crowdfunding";

  // Create a new database connection
  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check if the connection is successful
  if (!$con) {
    die("Failed to connect to the database!");
  }

  // Prepare the SQL query to retrieve user data from the 'users' table
  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

  // Execute the query
  $result = mysqli_query($con, $query);

  // Check if the login is successful
  if (mysqli_num_rows($result) == 1) {
    // Login successful
    session_start();
    $_SESSION['user_id'] = mysqli_fetch_assoc($result)['user_id'];
    header("Location: index.php");
    exit();
  } else {
    // Login failed
    echo "Login failed!";
  }

  // Close the database connection
  mysqli_close($con);
}

?>
