<header class="flex items-center justify-end bg-sky-600 text-white h-16 p-5">
    <nav class="w-1/4">
        <ul class="flex w-full justify-between">
            <li><a class="text-white" href="/">Página Inicial</a></li>

            <?php if (logged()) : ?>
                <li><a href="/dashboard">Logado como <?= user()->name; ?></a></li>
            <?php else : ?>

                
                <li><a class="text-white" href="/entrar">Faça login</a></li>
                <li><a class="text-white" href="/cadastrar">Cadastre-se</a></li>
            <?php endif; ?>
            
        </ul>
    </nav>
</header>