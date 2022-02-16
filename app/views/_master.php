<?php if (logged()) : ?>
    <div>Logado como <?= $_SESSION["user"]->name; ?></div>
<?php else : ?>
    <div><a href="/login">Faça login para continuar</a></div>
<?php endif; ?>

<?php require $view; ?>