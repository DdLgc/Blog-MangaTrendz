<?php
require_once __DIR__ . '/../../lib/start_session.php';
require_once __DIR__ . '/../../lib/session.php';
require_once __DIR__ . '/../../lib/config.php';
require_once __DIR__ . '/../../lib/pdo.php';
require_once __DIR__ . '/../../lib/menu.php';
require_once __DIR__ . '/../../lib/article.php';

if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

$pageKey = "admin/crud/edit.php";
$logoHref = _BASE_URL_ . "admin/index.php";

$mainMenu[$pageKey] = [
    "head_title" => "Modifier un article - MangaTrendz",
    "meta_description" => "Sélection d'un article à modifier dans l'espace administrateur.",
    "exclude" => true
];

$articles = getArticles($pdo);

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Modifier un article</h1>

    <?php if (!empty($articles)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-dark align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= (int) $article['id']; ?></td>
                            <td><?= htmlspecialchars($article['title']); ?></td>
                            <td><?= htmlspecialchars($article['created_at']); ?></td>
                            <td class="text-center">
                                <a href="<?= _BASE_URL_; ?>admin/crud/edit_article.php?id=<?= (int) $article['id']; ?>" class="btn btn-primary btn-sm">
                                    Modifier
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center">Aucun article à modifier.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?= _BASE_URL_; ?>admin/index.php" class="btn btn-outline-light">Retour au dashboard</a>
    </div>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>