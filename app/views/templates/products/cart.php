<h1>Bem vindo ao seu carrinho</h1>


<form method="POST" action="/site/<?= $site->slug; ?>/pagamento">
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $index => $product) : ?>
            <div class="w-11/12 my-5 lg:w-full drop-shadow bg-white rounded p-2">
                <img class="block" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
                <hr>

                <p class="p-1 ">
                <h2 class="text-cyan-600"><?= $product->name; ?></h2>
                </p>
                <p class="p-1 "><span class="text-sm">R$<?= $product->price; ?> </span> </p>
                <p class="p-1 text-sm text-slate-600"><span class="text-sm "><?= $product->description; ?> </span></p>
                <input type="number" value="<?= $product->quantity; ?>" placeholder="Quantidade do produto" name="product-<?= $product->id; ?>">
            </div>
        <?php endforeach; ?>

        <input type="submit" value="Finalizar compra" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">

    <?php else : ?>
        <p>Você não tem itens no carrinho</p>
    <?php endif; ?>
</form>