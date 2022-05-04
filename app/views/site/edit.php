<h1>Editando o site <?= $site->name; ?></h1>
<?= getFlash("error"); ?>

<form action="/site/<?= $site->slug; ?>/edit" method="POST">
    <div class="flex flex-col">
        <div class="my-3">
            <label for="name">Digite o nome do seu site</label>
            <input id="name" type="text" name="name" value="<?= $site->name; ?>">
        </div>

        <div class="my-3">
            <label for="description">Descreva sobre o que se trata seu site</label>
            <input id="description" type="text" name="description" value="<?= $site->description; ?>">
        </div>

        <div class="my-3">
            <label for="slug">Digite uma url para seu site</label>
            <input id="slug" type="text" name="slug" value="<?= $site->slug; ?>">
        </div>

        <input class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded" type="submit" value="Editar">
    </div>
</form>