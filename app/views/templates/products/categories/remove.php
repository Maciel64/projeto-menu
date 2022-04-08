<?php if ($site->template !== "products") { redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); } ?>
<?php if (!admin($site)) { redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página"); } ?>


<form class="m-0 text-center" action="/site/<?= $site->slug; ?>/category/<?= $category->id; ?>/remove" method="POST">

    <div class="mx-auto mb-6 text-left w-full w-fit drop-shadow bg-white rounded p-2">
        <p><?= $category->name; ?></p>
        <p><?= $category->description; ?></p>    
    </div>

    <p>
        Você tem certeza que quer apagar a categoria <?= $category->name; ?>? Ela possui <?= sizeof($products) > 1 ? sizeof($products) . " produtos" :  sizeof($products) . " produto"; ?>
    </p>
    <a href="/site/<?= $site->slug; ?>" class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input type="submit" value="Apagar" class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">
</form>