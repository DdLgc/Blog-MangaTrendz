<?php
session_start();
require_once __DIR__ . '/../../lib/pdo.php';

var_dump($_SESSION);
var_dump($_POST);

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (empty($title)) {
        $errors[] = 'Le titre est requis.';
    }
    if (empty($content)) {
        $errors[] = 'Le contenu est requis.';
    }

    if (empty($errors)) {

        $stmt = $pdo->prepare('INSERT INTO articles (title, content, created_at) VALUES (?, ?, NOW())');
        $stmt->execute([$title, $content]);
        $success = true;
    } else {
        $errors[] = 'Erreur lors de l\'insertion dans la base de données.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un Article</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>
    <h1>Créer un Nouvel Article</h1>

    <?php if ($success): ?>
        <p>L'article a été créé avec succès.</p>
        <p><a href="index.php">Retour au tableau de bord</a></p>
    <?php else: ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <Form action="" method="post">
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="content">Contenu</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <div>
                <button type="submit">Créer</button>
            </div>
        </Form>
    <?php endif; ?>
</body>

</html>