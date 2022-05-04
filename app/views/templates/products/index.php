 <?php if (admin($site)) : ?>
    <div class='flex z-0 m-5 rounded drop-shadow-md w-8/12 h-fit p-6 text-sky-600 border-2 bg-sky-200 border-sky-600'>
        <span class='flex mr-3 my-auto material-icons text-sky-600'>check_circle_outline</span>
        <span class='flex font-bold my-auto'>Você é o administrador desse site</span>
    </div>
<?php endif ?>


<section class="w-9/12 h-full relative ">
    <img src="<?= $site->bannerPhoto ? "/upload/" . $site->bannerPhoto : "/static/img/foto-fundo.jpg" ?>" alt="" class="w-full block h-60 ml-auto mr-auto rounded shadow-black shadow">

    <img src="<?= $site->profilePhoto ? "/upload/" . $site->profilePhoto : "/static/img/foto-perfil.jpeg" ?>" alt="" class=" w-28 h-28 absolute block m-auto  inset-x-0 top-44 bottom-11/12 rounded">

    <h1 class="font-bold mt-14 text-2xl"><?= $site->name; ?><span class="bg-green-400 text-green-700 ml-2 text-center">Aberto</span></h1>
</section>



<?php foreach ($categories as $index => $category) : ?>
    <section class="mb-10 mt-12 rounded drop-shadow-md w-8/12 h-fit bg-slate-50 p-6">

        <h2><?= $category->name; ?></h2>

        <section class="grid justify-center items-center flex-col lg:grid-cols-3 gap-4 mb-6 h-max">

            <?php if ($category->products) : ?>
                <?php foreach ($category->products as $product) : ?>

                    <div class=" w-11/12  lg:w-full drop-shadow bg-white rounded p-2">

                        <img class="block" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
                        <hr>
                        
                        <p class="p-1 ">
                            <h2 class="text-cyan-600"><?= $product->name; ?></h2>
                        </p>
                        <p class="p-1 "><span class="text-sm">R$<?= $product->price; ?> </span> </p>
                        <p class="p-1 text-sm text-slate-600"><span class="text-sm "><?= $product->description; ?> </span>
                    </p>
                        
                        <?php if (admin($site)) : ?>
                            <a href="/site/<?= $site->slug ?>/cart/add/product/<?= $product->id; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">+ Carrinho</a>
                            <a href="/site/<?= $site->slug ?>/produto/<?= $product->id; ?>/editar" class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit">Editar</a>
                            <a href="/site/<?= $site->slug ?>/produto/<?= $product->id; ?>/remover" class="bg-red-600 text-white p-2 mt-1 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">Apagar</a>
                        <?php endif ?>
                    </div>

                <?php endforeach; ?>

            <?php else : ?>
                <div class="col-span-3 w-full drop-shadow bg-white rounded p-2 h-28">

                    <?php if (admin($site)) : ?>
                        <p>Você ainda não tem produtos cadastrados</p>

                    <?php else : ?>

                        <p>Esse site ainda não tem produtos cadastrados</p>
                    <?php endif; ?>

                </div>
            <?php endif ?>

        </section>
        <?php if (admin($site)) : ?>
            <div class="mt-10">
                <a class=" bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/produto/novo">+ Cadastrar novo produto</a>
                <a class="mt-1 bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/editar">Editar Categoria</a>
                <a class="mt-1 bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit" href="./<?= $site->slug ?>/categoria/<?= $category->id; ?>/remover">Apagar Categoria</a>
            </div>
        <?php endif; ?>
    </section>

<?php endforeach; ?>

<?php if (admin($site)) : ?>
    <section class="my-5 rounded drop-shadow-md w-8/12 h-fit bg-slate-50 p-6">
        <a href="/site/<?= $site->slug ?>/categoria/nova" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">+ Nova categoria</a>
    </section>
<?php endif; ?>