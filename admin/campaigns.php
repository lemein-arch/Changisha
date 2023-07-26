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
      <!-- Content of your admin.php page goes here -->
      <div class="container">
        <h1>Campaigns</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Client Name</th>
              <th>Current Funds</th>
              <th>Pledged Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require '../connection.php';
            require '../functions.php';

            // Create a new database connection
            $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            // Check if the connection is successful
            if (!$con) {
              die("Failed to connect to the database!");
            }

            // Prepare the SQL query to retrieve project data where p_active is 1
            $query = "SELECT p_name, clientname, current_amount, pledge FROM projects WHERE p_active = 1";

            // Execute the query
            $result = mysqli_query($con, $query);

            // Fetch the project data and display it in the table rows
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['p_name'] . "</td>";
              echo "<td>" . $row['clientname'] . "</td>";
              echo "<td>" . $row['current_amount'] . "</td>";
              echo "<td>" . $row['pledge'] . "</td>";
              echo "</tr>";
            }

            // Close the database connection
            mysqli_close($con);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
