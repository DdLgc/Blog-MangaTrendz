<?php
require_once __DIR__ . '/../../lib/start_session.php';
require_once __DIR__ . '/../../lib/session.php';
require_once __DIR__ . '/../../lib/config.php';
require_once __DIR__ . '/../../lib/pdo.php';
require_once __DIR__ . '/../../lib/menu.php';

if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header('Location: ' . _BASE_URL_ . 'index.php');
    exit();
}

$pageKey = "admin/crud/create.php";
$logoHref = _BASE_URL_ . "admin/index.php";

$mainMenu[$pageKey] = [
    "head_title" => "Créer un article - MangaTrendz",
    "meta_description" => "Création d\'un nouvel article depuis l\'espace administrateur.",
    "exclude" => true
];

$errors = [];
$success = false;

$categoriesStmt = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
$categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $categoryId = isset($_POST['category_id']) ? (int) $_POST['category_id'] : 0;
    $imageName = null;

    if ($title === '') {
        $errors[] = 'Le titre est requis.';
    }

    if ($content === '') {
        $errors[] = 'Le contenu est requis.';
    }

    if ($categoryId <= 0) {
        $errors[] = 'La catégorie est requise.';
    }

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $originalName = basename($_FILES['image']['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $allowedExtensions, true)) {
                $errors[] = 'Format d\'image non autorisé. Utilisez jpg, jpeg, png ou webp.';
            } else {
                $imageName = uniqid('article_', true) . '.' . $extension;
                $destination = __DIR__ . '/../../assets/uploads/articles/' . $imageName;

                if (!move_uploaded_file($tmpName, $destination)) {
                    $errors[] = 'Erreur lors de l\'envoi de l\'image.';
                }
            }
        } else {
            $errors[] = 'Erreur lors de l\'upload du fichier image.';
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO articles (title, content, image, created_at, category_id)
            VALUES (:title, :content, :image, NOW(), :category_id)
        ");

        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);

        if ($imageName === null) {
            $stmt->bindValue(':image', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':image', $imageName, PDO::PARAM_STR);
        }

        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $errors[] = 'Erreur lors de l\'insertion dans la base de données.';
        }
    }
}

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Créer un nouvel article</h1>

    <?php if ($success): ?>
        <div class="alert alert-success">
            L'article a été créé avec succès.
        </div>
        <div class="text-center">
            <a href="<?= _BASE_URL_; ?>admin/index.php" class="btn btn-primary">Retour au tableau de bord</a>
        </div>
    <?php else: ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p class="mb-1"><?= htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width: 700px;">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea
                    name="content"
                    id="content"
                    class="form-control"
                    rows="8"
                    required
                ><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Choisir une catégorie</option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?= (int) $category['id'] ?>"
                            <?= (isset($_POST['category_id']) && (int) $_POST['category_id'] === (int) $category['id']) ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Image (optionnelle)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-success">Créer l\'article</button>
                <a href="<?= _BASE_URL_; ?>admin/index.php" class="btn btn-outline-light">Annuler</a>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>