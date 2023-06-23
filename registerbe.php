<?php

// Include the connection file
require 'connection.php';
require 'functions.php';

// Function to generate a unique user ID
function generateUserID() {
  // Include the connection file
  require 'connection.php';
  
  // Generate a random number
  $userID = random_num(8); // Assuming you have the random_num() function defined in your functions.php file

  // Check if the generated user ID already exists in the database
  $query = "SELECT * FROM users WHERE user_id = '$userID'";
  $result = mysqli_query($con, $query);
  
  // If the user ID exists, generate a new one recursively
  if (mysqli_num_rows($result) > 0) {
    mysqli_close($con);
    return generateUserID(); // Recursively call the function to generate a new user ID
  }
  
  mysqli_close($con);
  return $userID;
}


// Function to check password matching
function checkPasswordMatch($password, $confirmPassword) {
  if ($password !== $confirmPassword) {
    echo '<div class="alert alert-danger" role="alert">Passwords do not match.</div>';
    return false;
  }
  return true;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form values
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phonenumber'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['cpassword'];

  // Perform password matching validation
  if (!checkPasswordMatch($password, $confirmPassword)) {
    exit; // Stop further execution if passwords do not match
  }

  // Generate a unique user ID
  $userID = generateUserID();

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Insert user data into the database table
  $sql = "INSERT INTO users (name, email, phonenumber, password, user_id) VALUES ( '$name', '$email', '$phoneNumber', '$hashedPassword', '$userID')";
  
  // Execute the query
  if (mysqli_query($con, $sql)) {
    // Registration successful
    header("Location: login.php");
    exit();
  } else {
    echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($con) . '</div>';
  }

  // Close the database connection
  mysqli_close($con);
}
?>
