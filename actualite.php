<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/menu.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: 404.php");
    exit;
}

$article = getArticleById($pdo, $id);

if (!$article) {
    header("Location: 404.php");
    exit;
}

$imagePath = getArticleImage($article["image"]);

$mainMenu["actualite.php"] = [
    "head_title" => htmlentities($article["title"]),
    "meta_description" => htmlentities(substr($article["content"], 0, 250)),
    "exclude" => true
];

require_once __DIR__ . "/templates/header.php";
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= $imagePath ?>"
            class="d-block mx-lg-auto img-fluid"
            alt="<?= htmlentities($article["title"]) ?>"
            loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold mb-3"><?= htmlentities($article["title"]) ?></h1>
        <p class="lead"><?= nl2br(htmlentities($article["content"])) ?></p>
    </div>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>