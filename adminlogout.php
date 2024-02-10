<?php
session_start();

// Unset all session variables
$_SESSION = array();


// / Your logout logic here (session destruction, etc.)

// Set the expiration date of the cookies to a past date to delete them
setcookie('login_admin_username', '', time() - 3600, '/');
setcookie('login_admin_password', '', time() - 3600, '/');
// Destroy the session
session_destroy();

// Redirect to login page
header("Location: index.php");
exit();

// /
?>