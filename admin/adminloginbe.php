<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection file
require 'config.php';
require 'adminfunctions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $Admin_email = $_POST["Admin_email"];
  $Admin_password = $_POST["Admin_password"];

  // Create a new database connection
  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Admin_email = $_POST['Admin_email'];
		$Admin_password = $_POST['Admin_password'];

		if(!empty($Admin_email) && !empty($Admin_password))
		{

			//read from database
			$query = "Select * from access where Admin_email = '$Admin_email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Admin_password'] === $Admin_password);
				/*	{

						$_SESSION['Admin_id'] = $user_data['Admin_id'];
						header("Location: dashboard.php");
						die;
					} */
        }
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}
}

?>
