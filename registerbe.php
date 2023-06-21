<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phonenumber = $_POST["phonenumber"];
  $password = $_POST["password"];

  // Database connection parameters
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "kladi";

  // Create a new database connection
  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check if the connection is successful
  if (!$con) {
    die("Failed to connect to the database!");
  }

  // Prepare the SQL query to insert user data into the 'users' table
  $query = "INSERT INTO users (name, email, phonenumber, password) VALUES ('$name', '$email', '$phonenumber', '$password')";

  // Execute the query
  if (mysqli_query($con, $query)) {
    // Registration successful
    header("Location: login.php");
    exit();
  } else {
    // Registration failed
    echo "Registration failed!";
  }

  // Close the database connection
  mysqli_close($con);
}
?>
