<h1>Bem vindo a dashboard, <?= user()->name; ?></h1>

<?php if ($site) : ?>

    <table class="w-full my-5 table-auto border-separate">
        <thead>
            <tr class="text-white bg-sky-600">
                <th>Nome</th>
                <th>Descrição</th>
                <th>Slug</th>
                <th>Visualizar</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="m-2 border-2 border-sky-600"><?= $site->name; ?></td>
                <td class="m-1 border-2 border-sky-600"><?= $site->description; ?></td>
                <td class="m-1 border-2 border-sky-600"><?= $site->slug; ?></td>
                <td class="m-1 border-2 border-sky-600 bg-sky-600 text-white hover:bg-sky-700 hover:drop-shadow-lg"><a class="block w-full h-full" href="<?= "site/" . $site->slug; ?>">Visitar</a></td>
                <td class="m-1 border-2 border-green-600 bg-green-600 text-white hover:bg-green-700 hover:drop-shadow-lg"><a class="block w-full h-full" href="<?= "site/" . $site->slug; ?>/editar">Editar</a></td>
                <td class="m-1 border-2 border-red-600 bg-red-600 text-white hover:bg-red-700 hover:drop-shadow-lg"><a class="block w-full h-full" href="<?= "site/" . $site->slug; ?>/remover">Remover</a></td>
            </tr>
        </tbody>
    </table>

<?php else : ?>
    <p>Você não tem sites cadastrados</p>
<?php endif ?>

<div>
    <a class="ml-0 bg-red-600 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg inline-block rounded" href="/sair">Sair da sessão</a>
    <?php if (!$site) : ?>
        <a class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg inline-block rounded" href="/site/novo">Cadastrar novo site</a>
    <?php endif; ?>
</div>