<?php
// session_set_cookie_params([

//   'lifetime' => 3600,
//   'path' => '/',
//   'domain' => '_DOMAIN_',
//   // 'secure' => true,   necessite https
//   'httponly' => true //--évite les cookie manipulable en js
// ]);

function adminOnly()
{
  if (!isset($_SESSION['user'])) {
    header('location: ../login.php');
    exit();
  } elseif ($_SESSION['user']['role'] != 'admin') {

    header('location: ../index.php');
    exit();
  }
}
?>
