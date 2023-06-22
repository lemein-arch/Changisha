<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Changisha</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
   
  </style>
</head>

<body class="project-wrapper">
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
          <a class="nav-link" href="projects.php">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </nav>

  <header class="jumbotron-project jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Welcome to Changisha</h1>
      <a href="#project-section" class="btn btn-primary btn-lg">Get Started</a>
    </div>
  </header>

  <section class="project-section">
    <div class="container project-form">
      <form action="projectbe.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="projectName">Project Name:</label>
          <input type="text" class="form-control" id="projectName" name="projectName" required>
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
          <label for="fundingGoal">Funding Goal:</label>
          <input type="number" class="form-control" id="fundingGoal" name="fundingGoal" required>
        </div>

        <div class="form-group">
          <label for="startDate">Start Date:</label>
          <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>

        <div class="form-group">
          <label for="endDate">End Date:</label>
          <input type="date" class="form-control" id="endDate" name="endDate" required>
        </div>

        <div class="form-group">
          <label for="currentFunds">Current Funds:</label>
          <input type="number" class="form-control" id="currentFunds" name="currentFunds" required>
        </div>

        <div class="form-group">
          <label for="pledgedSupporters">Pledged Supporters:</label>
          <input type="number" class="form-control" id="pledgedSupporters" name="pledgedSupporters" required>
        </div>

        <div class="form-group">
          <label for="projectImage">Project Image:</label>
          <input type="file" class="form-control-file" id="projectImage" name="projectImage" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
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
