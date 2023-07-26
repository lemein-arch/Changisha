<?php

// Include the connection file
require '../connection.php';
require 'adminfunctions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Changisha|Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><b>Changisha</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="projects.php">Projects</a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Admin Login Form</h2>
      <form method="POST" action="adminlogbe.php">
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" class="form-control" id="Admin_email" name="Admin_email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="Admin_password" name="Admin_password" placeholder="Enter a password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        
      </form>
    </div>
  </div>
</section>

<footer class="container-fluid bg-dark text-light text-center">
    <p>&copy; Changisha. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
