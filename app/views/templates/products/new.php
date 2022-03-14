<?php if ($site->template !== "products") { redirectWithMessage("/", "error", "O site {$data["site"]} não possui o template de produtos"); } ?>
<?php if ($site->user_id !== user()->id) { redirectWithMessage("/site/{$site->slug}", "error", "Você não possui permissão para acessar essa página"); } ?>

<form action="../product/new" method="POST">
    <div>
        <label for="name">Nome do produto</label>
        <input id="name" type="text">
    </div>

    <div>
        <label for="description">Descrição do produto</label>
        <input id="description" type="text">
    </div>
    
    <div>
        <label for="price">Preço do produto</label>
        <input id="price" type="text">
    </div>

    <input class="bg-sky-600 text-white w-24 p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded" type="submit" value="Criar">
</form>