<h1>Bem vindo a dashboard do <?= $site->name; ?></h1>

<form action="/site/<?= $site->slug; ?>/dashboard" method="POST" enctype="multipart/form-data" class="flex flex-col">
    <input type="file" name="profilePhoto">
    <input type="file" name="bannerPhoto">
    <input type="submit" value="Editar fotos" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">

    <a href="/site/<?= $site->slug; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
</form>