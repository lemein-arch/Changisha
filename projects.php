<?php
require 'connection.php';
require 'functions.php';

// Check user login status
// check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Changisha</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
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

      // Display project container with links
      echo '<div class="project-container">';
      echo '<a href="cprojects.php"><img src="' . $projectImage . '" alt="Project Image" class="project-image"></a>';
      echo '<h3 class="project-name">' . $projectName . '</h3>';
      echo '<p class="funding-info">Funding Goal: KES' . $fundingGoal . ' | Current Funds: KES' . $currentFunds . '</p>';
      echo '<a href="cprojects.php" class="donate-button">Donate</a>';
      echo '</div>';
    }

    // Close the database connection
    mysqli_close($con);
    ?>
    
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
