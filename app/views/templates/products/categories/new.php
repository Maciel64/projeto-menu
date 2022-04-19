<?php if ($site->template !== "products") { return redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); } ?>
<?php if (!admin($site)) { return redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página"); } ?>

<form id="form" action="/site/<?= $site->slug; ?>/category/new" method="POST" enctype="multipart/form-data">
    <h1>Editar nova categoria</h1>
    <div>
        <label for="name">Nome da categoria</label>
        <input id="name" type="text" name="name">
    </div>

    <div>
        <label for="description">Descrição da categoria</label>
        <textarea class="border-black border-2 w-56 p-1 rounded-md" name="description"></textarea>
    </div>

    <a href="/site/<?= $site->slug; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input class="bg-green-600 text-white w-24 p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" type="submit" value="Criar">
</form>