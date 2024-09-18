<?php
require_once __DIR__ . "/templates/header.php";
?>

<div class="container mt-5">
    <h1 class="text-center ">Nous Contacter</h1>
    <p class="text-center card-text">Si vous avez des questions ou des suggestions, n'hésitez pas à nous contacter via ce formulaire.</p>

    <form action="contact.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "/templates/footer.php";
?>
