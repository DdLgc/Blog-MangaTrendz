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

$pageKey = "admin/crud/delete.php";
$logoHref = _BASE_URL_ . "admin/index.php";

$mainMenu[$pageKey] = [
    "head_title" => "Supprimer un article - MangaTrendz",
    "meta_description" => "Suppression d'un article depuis l'espace administrateur.",
    "exclude" => true
];

$successMessage = null;
$errorMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id) {
        $article = getArticleById($pdo, $id);

        if ($article) {
            $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if (!empty($article['image'])) {
                    $imagePath = __DIR__ . '/../../assets/uploads/articles/' . $article['image'];
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }

                $successMessage = "L'article a été supprimé avec succès.";
            } else {
                $errorMessage = "Erreur lors de la suppression de l'article.";
            }
        } else {
            $errorMessage = "Article introuvable.";
        }
    } else {
        $errorMessage = "ID invalide.";
    }
}

$articles = getArticles($pdo);

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Supprimer un article</h1>

    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?= htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($errorMessage); ?></div>
    <?php endif; ?>

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
                                <form method="post" action="" onsubmit="return confirm('Confirmer la suppression de cet article ?');" class="d-inline">
                                    <input type="hidden" name="id" value="<?= (int) $article['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center">Aucun article à supprimer.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?= _BASE_URL_; ?>admin/index.php" class="btn btn-outline-light">Retour au dashboard</a>
    </div>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>