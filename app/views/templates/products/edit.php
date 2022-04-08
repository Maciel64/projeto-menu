<?php if ($site->template !== "products") { redirectWithMessage("/", "error", "O site {$site->name} não possui o template de produtos"); } ?>
<?php if (!admin($site)) { redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página"); } ?>


<form action="/site/<?= $site->slug; ?>/product/<?= $product->id; ?>/edit" method="POST" enctype="multipart/form-data">
    <div class="pt-1">
        <label class="mr-3 p-3 pr-11 " for="name">Nome do produto</label>
        <input class="border-black border-2 p-1 rounded-md" id="name" type="text" name="name" value="<?= $product->name; ?>">
    </div>

    <div class="pt-1 flex items-center">
        <label class="mr-3 p-3 " for="description">Descrição do produto</label>
        <textarea class="border-black border-2 w-56 p-1 rounded-md" name="description"></textarea>
    </div>
    
    <div class="pt-1">
        <label class="mr-3 p-3 pr-12 " for="price">Preço do produto</label>
        <input class="border-black border-2 p-1 rounded-md" id="price" type="text" name="price" value="<?= $product->price; ?>">
    </div>

    <div class="pt-1">
        <label class="mr-3 p-3 pr-11 " for="photo">Foto do produto</label>
        <input class="p-1" type="file" name="photo" id="photo" value="">
    </div>

    <a href="/site/<?= $site->slug; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input class="bg-green-600 text-white w-24 p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" type="submit" value="Editar">
</form>

