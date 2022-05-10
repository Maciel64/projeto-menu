<h1>Bem vindo a dashboard do <?= $site->name; ?></h1>

<form action="/site/<?= $site->slug; ?>/dashboard" method="POST" enctype="multipart/form-data" class="flex flex-col">
    
    <h2>Fotos de perfil e de banner</h2>
    <input type="file" name="profilePhoto">
    <input type="file" name="bannerPhoto">


    <h2>Tipos de entrega</h2>
    
    <?php if ($site->thirdyPartyDelivery) : ?>
        <label for="delivery">Entrega própria</label>
        <input id="delivery" type="radio" name="thirdyPartyDelivery" value="0">
    
        <label for="ThirdyDelivery">Entrega por terceiros</label>
        <input id="ThirdyDelivery" type="radio" name="thirdyPartyDelivery" value="1" checked>
    <?php else : ?>
        <label for="delivery">Entrega própria</label>
        <input id="delivery" type="radio" name="thirdyPartyDelivery" value="0" checked>
    
        <label for="ThirdyDelivery">Entrega por terceiros</label>
        <input id="ThirdyDelivery" type="radio" name="thirdyPartyDelivery" value="1">
    <?php endif ?>

    <label for="cep">Digite seu CEP</label>
    <input id="cep" type="text" value="<?= $site->cep; ?>" name="cep">

    <input type="submit" value="Editar" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">

    <a href="/site/<?= $site->slug; ?>" class="bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
</form>