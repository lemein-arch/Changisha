<?php
require '../connection.php';
require 'adminfunctions.php';

verify_admin_login();

// Create a new database connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if the connection is successful
if (!$con) {
    die("Failed to connect to the database!");
}


// Prepare the SQL query to retrieve the total number of users with isAdmin = 0
$queryUsers = "SELECT COUNT(*) as total_users FROM users WHERE isAdmin = 0";

// Execute the query to get the number of users
$resultUsers = mysqli_query($con, $queryUsers);

// Fetch the total number of users
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];

// Prepare the SQL query to retrieve the number of active campaigns
$query = "SELECT COUNT(*) as active_campaigns FROM projects WHERE p_active = 1";

// Execute the query
$result = mysqli_query($con, $query);

// Fetch the number of active campaigns
$row = mysqli_fetch_assoc($result);
$activeCampaigns = $row['active_campaigns'];

// Close the database connection
mysqli_close($con);
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
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    
    .content-wrapper {
      flex: 1;
      display: flex;
      margin-top: 20px; /* Add margin between navbar and card */
    }
    
    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
    }
    
    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .sidebar li {
      margin-bottom: 40px;
    }
    
    .sidebar a {
      color: #333;
      text-decoration: none;
      transition: color 0.3s;
    }
    
    .sidebar a:hover {
      color: #000;
    }
    
    /* Add custom styling for the card */
    .custom-card {
      background-color: #007bff;
      color: #fff;
    }
    
    .custom-card .card-body {
      padding: 20px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="dashboard.php"><b>Changisha</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="projects.php">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlogout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="sidebar">
      <ul>
        <li>
          <a href="dashboard.php">Admin Dashboard</a>
        </li>
        <li>
          <a href="campaigns.php">Campaigns</a>
        </li>
        <li>
          <a href="manageprojects.php">Manage Projects</a>
        </li>
      </ul>
    </div>

    <div class="col-md-9">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card custom-card text-center">
              <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text"><?php echo $totalUsers; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card text-center">
              <div class="card-body">
                <h5 class="card-title">No. of Active Campaigns</h5>
                <p class="card-text"><?php echo $activeCampaigns; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card custom-card text-center">
              <div class="card-body">
                <h5 class="card-title">Donations</h5>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
