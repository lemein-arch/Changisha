<?php
require 'connection.php';
require 'functions.php';

//Check user login status
check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Changisha</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
  .project-container {
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 10px;
    display: inline-block;
  }

  .project-image {
    height: 350px;
    width: 320px;
  }

  .donate-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

  .donate-button:hover {
    background-color: #0069d9;
  }
</style>

</head>

<body class="main-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><b>Changisha</b></a>
    <a class="navbar-brand" href="startprojects.php">Start a Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>      
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Projects</h1>
    <?php
    // Retrieve project data from the 'projects' table
    $query = "SELECT * FROM projects";
    $result = mysqli_query($con, $query);

    // Display projects
    while ($row = mysqli_fetch_assoc($result)) {
      $projectName = $row['p_name'];
      $fundingGoal = $row['pledge'];
      $currentFunds = $row['current_amount'];
      $projectImage = $row['projectImage'];

      // Display project container
      echo '<div class="project-container">';
      echo '<img src="' . $projectImage . '" alt="Project Image" class="project-image">';
      echo '<h3 class="project-name">' . $projectName . '</h3>';
      echo '<p class="funding-info">Funding Goal: $' . $fundingGoal . ' | Current Funds: $' . $currentFunds . '</p>';
      echo '<button class="donate-button">Donate</button>';
      echo '</div>';
    }

    // Close the database connection and perform any necessary cleanup
    mysqli_close($con);
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
