<?php
require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/menu.php";
$currentPage = $pageKey ?? basename($_SERVER["SCRIPT_NAME"]);
$logoHref = $logoHref ?? (_BASE_URL_ . "index.php");
if (!isset($mainMenu[$currentPage])) {
  $mainMenu[$currentPage] = [
    "head_title" => "MangaTrendz",
    "meta_description" => "Site d'actualité manga et anime",
    "exclude" => true
  ];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $mainMenu[$currentPage]["meta_description"] ?>">
  <title><?= $mainMenu[$currentPage]["head_title"] ?></title>

  <link rel="icon" href="<?= _BASE_URL_; ?>assets/img/logo.jpg" type="image/jpg">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kolker+Brush&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Sofadi+One&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= _BASE_URL_; ?>assets/style.css">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-column flex-md-row align-items-center justify-content-between py-3 mb-4 border-bottom">

      <div class="col-12 col-md-3 text-center text-md-start mb-3 mb-md-0">
        <a href="<?= $logoHref; ?>" class="text-decoration-none">
          <img
            src="<?= _BASE_URL_; ?>assets/img/logo.jpg"
            alt="Logo MangaTrendz"
            width="150"
            class="logo img-fluid blinking-logo">
        </a>
      </div>

      <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php foreach ($mainMenu as $key => $menuItem): ?>
          <?php if (!array_key_exists("exclude", $menuItem)): ?>
            <li class="nav-item">
              <a href="<?= _BASE_URL_ . $key; ?>" class="nav-link px-2">
                <?= $menuItem["menu_title"]; ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>

      <div class="col-12 col-md-3 text-center text-md-end mt-3 mt-md-0">
        <?php if (isset($_SESSION["user"])): ?>
          <a href="<?= _BASE_URL_; ?>logout.php" class="btn btn-primary">Déconnexion</a>
        <?php else: ?>
          <a href="<?= _BASE_URL_; ?>login.php" class="btn btn-outline-primary">Connexion</a>
        <?php endif; ?>
      </div>

    </header>

    <main>