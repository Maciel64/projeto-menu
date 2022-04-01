<header class="flex items-center justify-end bg-sky-600 text-white h-16 p-5">

    <div class="flex bg-white mr-auto rounded-full w-14 h-12">

    </div>

    <nav class="w-1/4">
        <ul class="flex w-full justify-between">

            <li><a class="text-white" href="/">Página Inicial</a></li>

            <?php if (logged()) : ?>

                <li><a href="/dashboard">Logado como <?= user()->name; ?></a></li>
                <div class="perfil">

                    <span class="material-icons text-right w-12 h-full seta align-center  cursor-pointer mt-2">
                        expand_more
                    </span>
                </div>
                <aside>
                    <a href="" class="sair">sair</a>
                </aside>


            <?php else : ?>


                <li><a class="text-white" href="/entrar">Faça login</a></li>
                <li><a class="text-white" href="/cadastrar">Cadastre-se</a></li>
            <?php endif; ?>

        </ul>
    </nav>
</header>