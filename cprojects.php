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
    <h1>Fund This Project</h1>
    <div class="project-grid">
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
        $clientname = $row['clientname'];

        // Display project container with links
        echo '<div class="project-container">';
        echo '<img src="' . $projectImage . '" alt="Project Image" class="project-image">';
        echo '</div>';

        echo '<div class="project-details">';
        echo '<h3 class="project-name">Projext Name: ' . $projectName . '  |  Client Name: '.$clientname . '</h3>';
        echo '<p class="project-description">' . $row['p_description'] . '</p>';
        echo '<p class="funding-info">Funding Goal: KES' . $fundingGoal . ' | Current Funds: KES' . $currentFunds . '</p>';
        echo '</div>';
      }

      // Close the database connection
      mysqli_close($con);
      ?>
    </div>
  </div>
  <div class="donation-form">
    <h2>Make a Donation</h2>
    <form action="process_donation.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="dname" name="dname" required>
      <label for="email">Email:</label>
      <input type="email" id="demail" name="demail" required>
      <label for="phone">Phone Number:</label>
      <input type="tel" id="dphonenumber" name="dphonenumber" required>
      <label for="amount">Donation Amount:</label>
      <input type="number" id="amount" name="amount" min="1" required>
      <button type="submit">Donate</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
