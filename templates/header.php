<?php
require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/menu.php";
$currentPage = basename($_SERVER["SCRIPT_NAME"]);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $mainMenu[$currentPage]["meta_description"] ?>">
  <title><?= $mainMenu[$currentPage]["head_title"] ?></title>
  <link rel="icon" href="assets/img/Logo.jpg" type="image/jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kolker+Brush&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <!-- a remplacer -->
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Sofadi+One&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="assets/img/logo.jpg" alt="logo MangaTrendz" width="150" class="logo d-block mx-lg-auto img-fluid blinking-logo">
        </a>
      </div>

      <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php foreach ($mainMenu as $key => $menuItem) {
          if (!array_key_exists("exclude", $menuItem)) {
        ?>
            <li class="nav-item"><a href="<?= $key; ?>" class="nav-link px-2"><?= $menuItem["menu_title"]; ?></a>
            </li>
        <?php }
        }
        ?>
      </ul>

      <div class="col-md-3 text-end">
        <?php if (isset($_SESSION["user"])) { ?>
          <a href="logout.php" class="btn btn-primary">Déconnexion</a>
        <?php } else { ?>
          <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
        <?php } ?>
      </div>
    </header>
    <main>