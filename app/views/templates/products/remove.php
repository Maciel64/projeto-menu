<form class="m-0 text-center" action="/site/<?= $site->slug; ?>/product/<?= $product->id; ?>/remove" method="POST">

    <div class="mx-auto mb-6 text-left w-full w-fit drop-shadow bg-white rounded p-2">
        <img class="block max-w-xs" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
        <hr>
        <p><?= $product->price; ?></p>
        <p><?= $product->description; ?></p>    
    </div>

    <p>Você tem certeza que quer apagar o produto <?= $product->name; ?>?</p>
    <a href="/site/<?= $site->slug; ?>" class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input type="submit" value="Apagar" class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">
</form>