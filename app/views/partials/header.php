<header class="flex items-center justify-end bg-sky-600 text-white h-16 w-full p-5">

    <div class="flex bg-white mr-auto rounded-full w-14 h-12">

    </div>

    <nav class="flex">
        <ul class="flex w-full justify-between">



            <?php if ($site) : ?>
                <li class="mx-5 hidden"><a class="w-96 " href="/site/<?= $site->slug; ?>/carrinho">Meu carrinho</a></li>
            <?php endif; ?>

            <?php if (logged()) : ?>
                <li class="mx-5"><a class="w-96" href="/dashboard">Bem-Vindo <?= user()->name; ?></a></li>



            <?php else : ?>
                <li><a class="text-white" href="/entrar">Faça login</a></li>
                <li><a class="text-white" href="/cadastrar">Cadastre-se</a></li>
            <?php endif; ?>

            <div class="perfil flex justify-center items-center">

                <span class="lg:hidden  material-icons text-right w-8 h-full seta align-center  cursor-pointer mt-2">
                    expand_more
                </span>

            </div>
            <aside class="flex top-16 z-10">
                <a href="" class="sair">sair</a>
                <?php if ($site) : ?>
                    <li class="mx-5"><a class="w-96" href="/site/<?= $site->slug; ?>/carrinho">Meu carrinho</a></li>
                <?php endif; ?>
            </aside>

        </ul>
    </nav>
</header>