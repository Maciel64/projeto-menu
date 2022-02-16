<h1>Bem vindo a página de login</h1>

<?= getFlash("success", "color:green"); ?>
<?= getFlash("error"); ?>

<form action="/login" method="POST">
    <label for="email">Digite seu email</label>
    <input id="email" type="email" name="email">
    
    <label for="passwd">Digite sua senha</label>
    <input id="passwd" type="password" name="passwd">

    <input type="submit" value="Logar-se">
</form>