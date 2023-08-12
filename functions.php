<?php
session_start();

function check_login($con) {
    $user_data = null; // Assign an initial value to $user_data

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];

        if (!empty($id)) {
            $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Redirect to the start projects page only if not already on startprojects.php
                if (basename($_SERVER['PHP_SELF']) !== 'startprojects.php') {
                    header("Location: ../startprojects.php");
                    die;
                }
            }
        }
    }

    // Redirect to login if not already on login.php
    // if (basename($_SERVER['PHP_SELF']) !== 'login.php') {
    //     header("Location: ../Crowdfunding/login.php");
    //     die;
    // }

    return $user_data; // Return the user data or null
}

function random_num($length) {
    $text = "";

    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}
?>
