<?php
session_start();
require_once __DIR__ . '/../lib/pdo.php';
var_dump($_SESSION);

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user']]);
$user = $stmt->fetch();

if ($user === false || $user['role'] !== 'admin') {

header('Location: ../index.php');
exit();

}

require_once __DIR__ . '/../templates/header.php';
?>

<h1>Admin Dashboard</h1>
<button><a href="create.php">Créer</a></button>
<button><a href="edit.php">Modifier</a></button>
<button><a href="delete.php">Supprimer</a></button>

<?php
    require_once __DIR__ . "/templates/footer.php";
?>