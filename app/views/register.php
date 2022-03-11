<?php if (!$users) : ?>
    <div>Você está se cadastrando como usuário administrador. Cuidado com os dados que você estará utilizando</div>
<?php endif; ?>


<?= getFlash("error"); ?>

<form action="/register" method="POST">
    <div class="flex">
        <div>
            <label for="name">Digite seu nome</label>
            <input id="name" type="text" name="name">
        </div>
    
        <div>
            <label for="email">Seu email</label>
            <input id="email" type="email" name="email">
        </div>
    
        <div>
            <label for="passwd">Sua senha</label>
            <input id="passwd" type="password" name="passwd">
        </div>
    
        <input class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded" type="submit" value="Enviar">
    </div>
</form>