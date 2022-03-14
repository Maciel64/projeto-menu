<?= getFlash("success", "color:green"); ?>
<?= getFlash("error"); ?>

<h1>Bem vindo a página de login</h1>


<form action="/login" method="POST">
    <div class="flex">
        <div class="m-1 ml-0">
            <label for="email">Digite seu email</label>
            <input id="email" type="email" name="email">
        </div>
        
        <div class="m-1">
            <label for="passwd">Digite sua senha</label>
            <input id="passwd" type="password" name="passwd">
        </div>
    </div>

    <input class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded" type="submit" value="Logar-se">
</form>