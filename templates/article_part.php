<?php

        $imagePath =getArticleImage($article["image"]);

?>

<div class="col-md-4 my-2 d-flex">
    <div class="card">
        <img src=<?=$imagePath ?> class="card-img-top img-fluid img-thumbnail" alt="<?=htmlentities($article["title"])?>">
        <div class="card-body">
            <h5 class="card-title"><?= htmlentities($article["title"]) ?></h5>
            <p class="card-text"><?= htmlentities(substr($article["content"],0 , 100))?></p>
            <a href="actualite.php?id=<?=$article["id"]?>" class="btn btn-primary">Lire la suite</a>
        </div>
    </div>
</div>

<!-- amodifier pour les images meme tailles !!  -->