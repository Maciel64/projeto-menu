<h1>Bem vindo ao seu carrinho</h1>


<?php foreach($products as $index => $product ) : ?>
    <div>
        <p><?= $product->name; ?></p>
        <p><?= $product->description; ?></p>
        <p><?= $product->price; ?></p>
        
        <a href="/site/<?= $site->slug; ?>/carrinho/adicionar/produto/<?= $index ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">+</a>
        <span>Unidades: <?= $product->quantity; ?></span>
        <a href="/site/<?= $site->slug; ?>/carrinho/remover/produto/<?= $index ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">-</a>
    </div>
<?php endforeach; ?>

<a href="/site/<?= $site->slug; ?>/finalizar" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Finalizar compra</a>