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

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ' . _BASE_URL_ . 'admin/crud/edit.php');
    exit();
}

$article = getArticleById($pdo, $id);

if (!$article) {
    header('Location: ' . _BASE_URL_ . '404.php');
    exit();
}

$pageKey = "admin/crud/edit_article.php";
$logoHref = _BASE_URL_ . "admin/index.php";

$mainMenu[$pageKey] = [
    "head_title" => "Éditer un article - MangaTrendz",
    "meta_description" => "Modification d'un article depuis l'espace administrateur.",
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
    $imageName = $article['image'];

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
                $newImageName = uniqid('article_', true) . '.' . $extension;
                $destination = __DIR__ . '/../../assets/uploads/articles/' . $newImageName;

                if (move_uploaded_file($tmpName, $destination)) {
                    if (!empty($article['image'])) {
                        $oldImagePath = __DIR__ . '/../../assets/uploads/articles/' . $article['image'];
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    $imageName = $newImageName;
                } else {
                    $errors[] = 'Erreur lors de l\'envoi de la nouvelle image.';
                }
            }
        } else {
            $errors[] = 'Erreur lors de l\'upload du fichier image.';
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            UPDATE articles
            SET title = :title,
                content = :content,
                image = :image,
                category_id = :category_id
            WHERE id = :id
        ");

        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);

        if ($imageName === null) {
            $stmt->bindValue(':image', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':image', $imageName, PDO::PARAM_STR);
        }

        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $success = true;
            $article = getArticleById($pdo, $id);
        } else {
            $errors[] = 'Erreur lors de la mise à jour de l\'article.';
        }
    }
}

require_once __DIR__ . '/../../templates/header.php';
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Modifier l'article</h1>

    <?php if ($success): ?>
        <div class="alert alert-success">
            L'article a été mis à jour avec succès.
        </div>
    <?php endif; ?>

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
                value="<?= htmlspecialchars($_POST['title'] ?? $article['title']); ?>"
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
            ><?= htmlspecialchars($_POST['content'] ?? $article['content']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Choisir une catégorie</option>
                <?php
                $selectedCategory = isset($_POST['category_id']) ? (int) $_POST['category_id'] : (int) $article['category_id'];
                ?>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= (int) $category['id']; ?>" <?= ($selectedCategory === (int) $category['id']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php if (!empty($article['image'])): ?>
            <div class="mb-3">
                <p>Image actuelle :</p>
                <img src="<?= getArticleImage($article['image']); ?>" alt="<?= htmlspecialchars($article['title']); ?>" class="img-fluid rounded" style="max-width: 250px;">
            </div>
        <?php endif; ?>

        <div class="mb-4">
            <label for="image" class="form-label">Remplacer l'image (optionnel)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="<?= _BASE_URL_; ?>admin/crud/edit.php" class="btn btn-outline-light">Retour</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../../templates/footer.php'; ?>