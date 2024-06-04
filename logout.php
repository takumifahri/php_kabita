<<<<<<< HEAD
<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_set('session.use_cookies', 1) === TRUE) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

// Destroy the session session data
session_destroy();

// Redirect to login page
header("Location: index.php");
exit;
?>
=======
<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();  

    header("Location: index.php");
    exit;
?>
>>>>>>> a6d1ed9fc0fbbbb8e5dcdda7ab2731dbf2b2b9f7
