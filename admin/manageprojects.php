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
          <a class="nav-link" href="logout.php">Log Out</a>
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
    <h1>Manage Projects</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Project Name</th>
          <th>Client Name</th>
          <th>Activity</th>
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
        $query = "SELECT p_id, p_name, clientname, p_description, current_amount, pledge, start_date, end_date FROM projects WHERE p_active = 0";

        // Execute the query
        $result = mysqli_query($con, $query);

        // Fetch the project data and display it in the table rows
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['p_name'] . "</td>";
          echo "<td>" . $row['clientname'] . "</td>";
          echo '<td><a class="btn btn-primary" data-toggle="modal" data-target="#projectModal' . $row['p_id'] . '">View</a></td>';
          echo "</tr>";

          // Modal for each project
          echo '<div class="modal fade" id="projectModal' . $row['p_id'] . '" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel' . $row['p_id'] . '" aria-hidden="true">';
          echo '<div class="modal-dialog" role="document">';
          echo '<div class="modal-content">';
          echo '<div class="modal-header">';
          echo '<h5 class="modal-title" id="projectModalLabel ' . $row['p_id'] . '">' . $row['p_name'] . '</h5>';
          echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
          echo '<span aria-hidden="true">&times;</span>';
          echo '</button>';
          echo '</div>';
          echo '<div class="modal-body">';
          echo '<p><strong>Client Name: </strong>' . $row['clientname'] . '</p>';
          echo '<p><strong>Project Description: </strong>' . $row['p_description'] . '</p>';
          echo '<p><strong>Current Funds: </strong>' . $row['current_amount'] . '</p>';
          echo '<p><strong>Pledged Amount: </strong>' . $row['pledge'] . '</p>';
          echo '<p><strong>Start Date: </strong>' . date('d/m/Y', strtotime($row['start_date'])) . '</p>';
          echo '<p><strong>End Date: </strong>' . date('d/m/Y', strtotime($row['end_date'])) . '</p>';
          echo '</div>';
          echo '<div class="modal-footer">';
          echo '<button type="button" class="btn btn-success" onclick="approveProject(' . $row['p_id'] . ')">Approve</button>';
          echo '<button type="button" class="btn btn-danger">Deny</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  function approveProject(projectId) {
    // Make an AJAX request to the PHP script that updates the p_active column
    $.ajax({
      type: "POST",
      url: "update_project_status.php",
      data: { projectId: projectId },
      success: function(response) {
        // Handle the response from the PHP script
        if (response === "success") {
          // Perform any desired actions upon successful update
          alert("Project approved successfully!");
        } else {
          // Handle the case when the update fails
          alert("Failed to approve the project. Please try again.");
        }
      }
    });
  }
</script>

</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
