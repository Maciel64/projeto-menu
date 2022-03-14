<?= getFlash("success", "color:green"); ?>
<?= getFlash("error"); ?>

<?php if (admin($site)) : ?>
    <p style="color:green;">Você é o administrador desse site</p>
<?php endif ?>

<h1>Bem vindo ao site <?= $site->name; ?></h1>

