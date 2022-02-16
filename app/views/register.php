<?php if (!$users) : ?>
    <div>Você está se cadastrando como usuário administrador. Cuidado com os dados que você estará utilizando</div>
<?php endif; ?>


<?= getFlash("error"); ?>

<form action="/register" method="POST">
    <label for="name">Digite seu nome</label>
    <input id="name" type="text" name="name">

    <label for="email">Seu email</label>
    <input id="email" type="email" name="email">

    <label for="passwd">Sua senha</label>
    <input id="passwd" type="password" name="passwd">

    <input type="submit" value="Enviar">
</form>