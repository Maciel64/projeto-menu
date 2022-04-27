
    <section class="w-9/12 ">
        <img src="/static/img/foto-fundo.jpg" alt="" class="w-full block h-60 ml-auto mr-auto rounded relative shadow-black shadow">
        
        <img src="/static/img/foto-perfil.jpeg" alt="" class="w-28 h-28 absolute block m-auto  inset-x-0 top-96 bottom-11/12 rounded">
        
        <h1 class="font-bold mt-12  text-2xl">Menu Poke Joinvile  <span class="bg-green-400 text-green-700 ml-2 text-center">Aberto</span></h1>
    </section>


<?php foreach ($categories as $index => $category) : ?>
    <section class="mb-10 mt-12 rounded drop-shadow-md w-8/12 h-fit bg-slate-50 p-6">
        <h2><?= $category->name; ?></h2>
        <section class="grid grid-cols-3 gap-4 mb-6 h-max">

            <?php if ($category->products) : ?>
                <?php foreach ($category->products as $product) : ?>

                    <div class="w-full drop-shadow bg-white rounded p-2">

                        <img class="block" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
                        <hr>
                        <p class="p-1 ">
                        <h2 class="text-cyan-600"><?= $product->name; ?></h2>
                        </p>
                        <p class="p-1 "><span class="text-sm">R$<?= $product->price; ?> </span> </p>
                        <p class="p-1 text-sm text-slate-600"><span class="text-sm "><?= $product->description; ?> </span> </p>

                        <?php if (admin($site)) : ?>

                            <a href="/site/<?= $site->slug ?>/produto/<?= $product->id; ?>/editar" class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit">Editar</a>
                            <a href="/site/<?= $site->slug ?>/produto/<?= $product->id; ?>/remover" class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">Apagar</a>

                        <?php endif ?>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>
                <div class="col-span-2 w-full drop-shadow bg-white rounded p-2 h-28">

                    <?php if (admin($site)) : ?>
                        <p>Você ainda não tem produtos cadastrados</p>

                    <?php else : ?>

                        <p>Esse site ainda não tem produtos cadastrados</p>
                    <?php endif; ?>

                </div>
            <?php endif ?>

        </section>
        <?php if (admin($site)) : ?>
            <a class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/produto/novo">+ Cadastrar novo produto</a>
            <a class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/editar">Editar Categoria</a>
            <a class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/remover">Apagar Categoria</a>
        <?php endif; ?>
    </section>

<?php endforeach; ?>

<?php if (admin($site)) : ?>
    <section class="mb-10 rounded drop-shadow-md w-8/12 h-fit bg-slate-50 p-6">
        <a href="/site/<?= $site->slug ?>/categoria/nova" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">+ Nova categoria</a>
    </section>
<?php endif; ?>