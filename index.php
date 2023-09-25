<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/menu.php"; 
require_once __DIR__ . "/templates/header.php";
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
  <div class="col-10 col-sm-8 col-lg-6">
    <img src="./assets/img/Logo.png" class="d-block mx-lg-auto img-fluid rounded-3" alt="LogoSite"width="700" height="500" loading="lazy">
  </div>
  <div class="col-lg-6">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero withimage<h1>
    <p class="lead p-3 text-light-emphasis bg-primary-subtle border border-primary-subtlerounded-3">Bienvenue sur notre site d'actualités dédié aux mangas ! Plongez dans l'univers captivant de labande dessinée japonaise et découvrez tout ce que vous devez savoir sur vos séries préférées, lesnouveaux chapitres, les adaptations animées, les événements manga à ne pas manquer et bien plusencore.</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
      <a href="actualites.php" class="btn btn-primary btn-lg px-4 me-md-2">Voir toutes actualités</a>
    </div>
  </div>
</div>

<div class="row text-center">
    <?php foreach ($articles as $key => $article) {
        require __DIR__ . "/templates/article_part.php";
    } ?>

</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>



