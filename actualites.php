<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/menu.php";

$limit = 10;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}

$totalArticles = getTotalArticle($pdo);
$totalPages = ceil($totalArticles / $limit);

if ($page > $totalPages && $totalPages > 0) {
    $page = $totalPages;
}

$articles = getArticles($pdo, $limit, $page);

require_once __DIR__ . "/templates/header.php";
?>

<h1 class="text-center my-4">Actualités</h1>

<div class="row text-center">
    <?php foreach ($articles as $article): ?>
        <?php require __DIR__ . "/templates/article_part.php"; ?>
    <?php endforeach; ?>
</div>

<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center mt-4">

            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Précédent</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Suivant</a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . "/templates/footer.php"; ?>