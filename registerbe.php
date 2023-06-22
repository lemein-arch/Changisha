<?php

// Include the connection file
require 'connection.php';
require 'functions.php';

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

  // Insert values into the database table
  $sql = "INSERT INTO users (name, email, phone_number, password) VALUES ('$name', '$email', '$phoneNumber', '$password')";
  // Execute the query
  if (mysqli_query($con, $query)) {
    // Registration successful
    header("Location: login.php");
    exit();
  }else {
    echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

