<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/menu.php";
require_once __DIR__ . "/templates/header.php";

$articles = getArticles($pdo, _HOME_ARTICLES_LIMIT_);

if (count($articles) > 0) {
    $firstArticle = array_shift($articles);
    $firstArticle['class'] = 'featured-article';
    array_unshift($articles, $firstArticle);
}
?>

<section class="news-banner">
    <div class="news-container">
        <div class="news-ticker">
            <?php
            $stmt = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC LIMIT 10');
            while ($article = $stmt->fetch()) {
                echo '<div class="news-item">' . htmlspecialchars($article['title']) . '</div>';
            }
            ?>
        </div>
    </div>
</section>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-lg-12">
        <h1 class="fw-bold">Bienvenue sur MangaTrendz</h1>
        <p class="lead">Découvrez les dernières actualités du monde des mangas et des animes !</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="actualites.php" class="button btn btn-primary btn-lg px-4 me-md-2">Voir toutes les actualités</a>
        </div>
    </div>
</div>

<section class="featured-article-container container">
    <div class="row">
        <?php
        if (count($articles) > 0) {
            $firstArticle = array_shift($articles);
        ?>
            <div class="col-12 col-md-6 featured-article">
                <img src="assets/uploads/articles/<?= htmlspecialchars($firstArticle['image']) ?>" alt="<?= htmlspecialchars($firstArticle['title']) ?>" class="img-fluid">
                <h2><?= htmlspecialchars($firstArticle['title']) ?></h2>
                <p><?= htmlspecialchars(substr($firstArticle['content'], 0, 150)) ?>...</p>
                <a href="actualite.php?id=<?= $firstArticle['id'] ?>" class="button btn btn-secondary">Lire plus</a>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column">
                <?php foreach ($articles as $key => $article): ?>
                    <?php if ($key < 2): ?>
                        <div class="article-small mb-4">
                            <img src="/assets/uploads/articles/<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="img-fluid">
                            <h3><?= htmlspecialchars($article['title']) ?></h3>
                            <p><?= htmlspecialchars(substr($article['content'], 0, 100)) ?>...</p>
                            <a href="actualite.php?id=<?= $article['id'] ?>" class="button btn btn-secondary">Lire plus</a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php
        } else {
            echo "<p>Aucun article disponible.</p>";
        }
        ?>
    </div>
</section>

<div class="row text-center">
    <?php foreach ($articles as $key => $article) {
        require __DIR__ . "/templates/article_part.php";
    } ?>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>