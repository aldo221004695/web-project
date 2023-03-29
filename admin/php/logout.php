<?php
    session_start(); // Start the session
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session data
    header("Location: ../../admin.php"); // Redirect the user to the admin page
exit();
?>