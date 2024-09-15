</main>

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <?php foreach ($mainMenu as $key => $menuItem) {
            if (!array_key_exists("exclude", $menuItem)) { ?>
                <li class="nav-item">
                    <a href="<?= $key; ?>" class="nav-link"><?= $menuItem["menu_title"]; ?></a>
                </li>
        <?php }
        } ?>
    </ul>
    <p class="text-center text-body-secondary">© <?= date("Y") ?> DdLgc</p>
</footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>