<?php
session_start();
file_put_contents('logout.log', 'Session ID avant destruction: ' . session_id() . "\n", FILE_APPEND);

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
file_put_contents('logout.log', 'Session détruite. Session ID après destruction: ' . session_id() . "\n", FILE_APPEND);

header('Location: login.php');
exit();
