<section class="grid grid-cols-2 gap-4 mb-6 h-max">

    <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="w-full drop-shadow bg-white rounded p-2">
                <img class="block" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fcdn.panelinha.com.br%2Freceita%2F1564686701281-PUMPKIN-PIE.jpg&imgrefurl=https%3A%2F%2Fwww.panelinha.com.br%2Freceita%2Ftorta-abobora-americana&tbnid=LYaWY-e6MkFvHM&vet=12ahUKEwi5u-fVhPH2AhVQLbkGHTnbD0wQMygCegUIARDiAQ..i&docid=Gw0CkneJcCIfNM&w=652&h=434&q=imagem%20torta&ved=2ahUKEwi5u-fVhPH2AhVQLbkGHTnbD0wQMygCegUIARDiAQ" alt="">
                <h1 class="font-bold">Tortare</h1>
                <p class="text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint labore, nam quasi totam aperiam esse adipisci nihil optio mollitia illum expedita eaque beatae sapiente eos dolor. Quod id quo iste?</p>
                
                <?php if (admin($site)) : ?>
                    <a  class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit">Editar</a>
                    <a  class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">Apagar</a>
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