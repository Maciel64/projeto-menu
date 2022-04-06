<?php if (admin($site)) : ?>
    <p class="text-sky-500">Você é o administrador desse site</p>
<?php endif ?>

<?= getFlash("success", "color:green"); ?>
<?= getFlash("error"); ?>

<h1>Bem vindo ao site <?= $site->name; ?></h1>