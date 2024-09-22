<?php
$imagePath = getArticleImage($article["image"]);
?>

<div class="col-md-4 my-2 d-flex">
    <div class="card h-100">
        <img src="<?= $imagePath ?>" class="card-img-top img-fluid img-thumbnail" alt="<?= htmlentities($article["title"]) ?>" style="height: 200px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlentities($article["title"]) ?></h5>
            <p class="card-text"><?= htmlentities(substr($article["content"], 0, 100)) ?>...</p>
            <a href="actualite.php?id=<?= $article["id"] ?>" class="button btn btn-primary mt-auto">Lire la suite</a>
        </div>
    </div>
</div>