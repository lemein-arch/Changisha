<?php
session_start();

// Function to verify if an admin user is logged in
function verify_admin_login() {
    if (!isset($_SESSION['Admin_id'])) {
        // Admin is not logged in, redirect to the login page
        header("Location: adminlog.php");
        exit();
    } else {
        // Admin is logged in, update the last activity time
        if (isset($_SESSION['last_activity'])) {
            $session_timeout = 300; // 300 seconds = 5 minutes

            if (time() - $_SESSION['last_activity'] > $session_timeout) {
                // Session has expired, destroy the session and redirect to login
                session_unset();
                session_destroy();
                header("Location: adminlog.php");
                exit();
            }
        }

        $_SESSION['last_activity'] = time();
    }
}
?>
