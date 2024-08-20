<?php
session_start();
require_once __DIR__ . '/../lib/pdo.php';


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
<button><a href="">Creer</a></button>
<button><a href="">Edit</a></button>
<button><a href="">Supprimer</a></button>

<?php
    require_once __DIR__ . "/templates/footer.php";
?>