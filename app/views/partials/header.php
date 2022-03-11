<header class="flex items-center justify-end bg-sky-600 text-white h-16 p-5">
    <?php if (logged()) : ?>
        <div><a href="/dashboard">Logado como <?= user()->name; ?></a></div>
    <?php else : ?>
        <div>
            <a class="text-white" href="/login">Faça login</a>
            <a class="text-white" href="/cadastrar">Cadastre-se</a>
        </div>
    <?php endif; ?>
</header>