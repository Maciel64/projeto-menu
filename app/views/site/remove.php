<h1>Você tem certeza que quer remover o site <?= $site->name; ?>?</h1>

<form action="/site/<?= $site->slug; ?>/remove" method="POST">
    <div>
        <a class="bg-green-600 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit" href="/site/<?= $site->slug; ?>">Voltar</a>
        <input class="bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit" type="submit" value="Apagar">
    </div>
</form>