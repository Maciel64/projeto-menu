<h1>Editando o site <?= $site->name; ?></h1>
<?= getFlash("error"); ?>

<form action="/site/<?= $site->slug; ?>/edit" method="POST">
    <div class="flex flex-col">
        <div class="my-3 ">
            <label for="name" class="mr-3 p-3 pr-10">Digite o nome do seu site</label>
            <input id="name" class="border-black border-2 w-56 p-1 rounded-md" type="text" name="name" value="<?= $site->name; ?>">
        </div>

        <div class="my-3 pt-1 block lg:flex lg:justify-start">
            <label for="description" class="mr-3 p-3 pr-10">Descreva sobre o que se trata seu site</label>
            <textarea id="description" class="border-black border-2 w-56 p-1 rounded-md" type="text" name="description" value="<?= $site->description; ?>"></textarea>
        </div>

        <div class="my-3">
            <label for="slug" class="mr-3 p-3 pr-10">Digite uma url para seu site</label>
            <input id="slug" class="border-black border-2 w-56 p-1 rounded-md" type="text" name="slug" value="<?= $site->slug; ?>">
        </div>

        <input class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded" type="submit" value="Editar">
    </div>
</form>