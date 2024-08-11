<?php

require_once __DIR__ . '/../lib/start_session.php';
require_once __DIR__ . '/../lib/session.php';
require_once __DIR__ . "templates/header.php";
session_start();
var_dump($_SESSION);
exit();
adminOnly();
?>

<h1>Admin Dashboard</h1>
<button><a href="">Creer</a></button>
<button><a href="">Edit</a></button>
<button><a href="">Supprimer</a></button>

<?php
    require_once __DIR__ . "/templates/footer.php";
?>