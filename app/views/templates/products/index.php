<section class="grid grid-cols-2 gap-4 mb-6 h-max">

    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="w-full drop-shadow bg-white rounded p-2">
                <img class="block" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
                <hr>
                <p><?= $product->name; ?><?= $product->price; ?></p>
                <p><?= $product->description; ?></p>
                
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
    <a class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded block w-fit" href="./<?= $site->slug ?>/produtos/novo">Cadastrar novo produto</a>
<?php endif; ?>