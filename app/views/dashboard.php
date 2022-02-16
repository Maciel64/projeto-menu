<?php if (!logged()) { redirectWithMessage("/login", "error", "Faça login para conectar-se a sua dashboard"); } ?>

<h1>Bem vindo a dashboard, <?= $user->name ?></h1>

<a href="/logout">Sair da sessão</a>