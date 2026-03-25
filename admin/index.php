<?php
require_once __DIR__ . '/../lib/start_session.php';
require_once __DIR__ . '/../lib/session.php';
require_once __DIR__ . '/../lib/config.php';
require_once __DIR__ . '/../lib/pdo.php';
require_once __DIR__ . '/../lib/menu.php';

if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

$pageKey = "admin/index.php";
$logoHref = _BASE_URL_ . "admin/index.php";

$mainMenu[$pageKey] = [
    "head_title" => "Dashboard Admin - MangaTrendz",
    "meta_description" => "Tableau de bord administrateur MangaTrendz",
    "exclude" => true
];

require_once __DIR__ . '/../templates/header.php';
?>

<h1>Admin Dashboard</h1>

<div class="container my-4">
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        <a href="<?= _BASE_URL_; ?>admin/crud/create.php" class="button btn btn-primary">Créer un article</a>
        <a href="<?= _BASE_URL_; ?>admin/crud/edit.php" class="button btn btn-secondary">Modifier un article</a>
        <a href="<?= _BASE_URL_; ?>admin/crud/delete.php" class="button btn btn-danger">Supprimer un article</a>
    </div>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>