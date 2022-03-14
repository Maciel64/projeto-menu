<section class="grid grid-cols-2 gap-4 mb-6 h-max">

    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="w-full drop-shadow bg-white rounded p-2 h-28">
                <img class="" src="https://img.itdg.com.br/tdg/images/blog/uploads/2017/07/shutterstock_413580649-300x200.jpg" alt="">
                <p><?= $product->name; ?></p>
            </div>
        <?php endforeach; ?>

    <?php else : ?>
        <div class="col-span-2 w-full drop-shadow bg-white rounded p-2 h-28">

            <?php if (admin($site)) : ?>
                <p>Você ainda não tem produtos cadastrados</p>

            <?php else : ?>

                <p>Esse site ainda não tem produtos cadastrdos</p>
            <?php endif; ?>

        </div>
    <?php endif ?>

</section>

<?php if (admin($site)) : ?>
    <a class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded block w-fit" href="./<?= $site->slug ?>/produtos/novo">Cadastrar novo produto</a>
<?php endif; ?>