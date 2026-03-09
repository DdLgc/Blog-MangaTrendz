<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/menu.php";

$limit = 12;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}

$categoryId = isset($_GET['category']) ? (int) $_GET['category'] : null;
if ($categoryId !== null && $categoryId < 1) {
    $categoryId = null;
}

$totalArticles = getTotalArticle($pdo, $categoryId);
$totalPages = (int) ceil($totalArticles / $limit);

if ($totalPages < 1) {
    $totalPages = 1;
}

if ($page > $totalPages) {
    $page = $totalPages;
}

$articles = getArticles($pdo, $limit, $page, $categoryId);

$categories = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/templates/header.php";
?>

<h1 class="text-center my-4">Actualités</h1>

<form method="get" class="d-flex justify-content-center align-items-center flex-wrap gap-2 my-4">
    <select name="category" class="form-select w-auto">
        <option value="">Toutes les catégories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= (int) $cat['id'] ?>" <?= ($categoryId == (int) $cat['id']) ? 'selected' : '' ?>>
                <?= htmlentities($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-primary">Filtrer</button>

    <?php if ($categoryId): ?>
        <a href="actualites.php" class="btn btn-outline-light">Réinitialiser</a>
    <?php endif; ?>
</form>

<div class="row text-center">
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <?php require __DIR__ . "/templates/article_part.php"; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">Aucun article trouvé pour cette catégorie.</p>
    <?php endif; ?>
</div>

<?php
$queryBase = [];
if ($categoryId) {
    $queryBase['category'] = $categoryId;
}
?>

<?php if ($totalPages > 1): ?>
    <nav class="mt-4">
        <ul class="pagination justify-content-center">

            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?<?= http_build_query(array_merge($queryBase, ['page' => $page - 1])) ?>">
                        Précédent
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query(array_merge($queryBase, ['page' => $i])) ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?<?= http_build_query(array_merge($queryBase, ['page' => $page + 1])) ?>">
                        Suivant
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . "/templates/footer.php"; ?>