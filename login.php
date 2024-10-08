<?php
require_once __DIR__ . "/lib/start_session.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/user.php";
require_once __DIR__ . "/lib/menu.php";
require_once __DIR__ . "/templates/header.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


$errors = [];

if (isset($_POST["loginUser"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = verifyUserLoginPassword($pdo, $email, $password);

    if ($user) {
        $_SESSION['user'] = $user['id'];
        $_SESSION['role '] = $user['role'];


        if ($user["role"] === "user") {
            header("Location: index.php");
        } elseif ($user["role"] === "admin") {
            header("Location: admin/index.php");
        }
    } else {
        $errors[] = "Email ou mot de passe incorrect";
    }
}

?>

<h1>Login</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($error); ?>
    </div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">

</form>

<?php
require_once __DIR__ . "/templates/footer.php";
?>