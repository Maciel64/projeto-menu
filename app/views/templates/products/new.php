<?php if ($site->template !== "products") { return redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); } ?>
<?php if (!admin($site)) { return redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página"); } ?>

<form action="/site/<?= $site->slug; ?>/category/<?= $category->id; ?>/product/new" method="POST" enctype="multipart/form-data">
    <h1>Cadastrar novo produto</h1>

    <div>
        <label for="name">Nome do produto</label>
        <input id="name" type="text" name="name">
    </div>

    <div>
        <label for="description">Descrição do produto</label>
        <input id="description" type="text" name="description">
    </div>

    <div>
        <label for="price">Preço do produto</label>
        <input id="price" type="text" name="price">
    </div>

    <div>
        <label for="photo">Foto do produto</label>
        <input type="file" name="photo" id="photo">
    </div>

    <a href="/site/<?= $site->slug; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input class="bg-green-600 text-white w-24 p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" type="submit" value="Criar">
</form>