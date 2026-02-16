<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/menu.php";
require_once __DIR__ . "/templates/header.php";

http_response_code(404);
?>

<div class="container text-center py-5">
    <h1>404</h1>
    <p class="lead">La page que vous recherchez n'existe pas.</p>
    <a href="index.php" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>