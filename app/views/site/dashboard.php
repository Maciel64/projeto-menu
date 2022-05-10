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

    <span class="mt-2">
        <label for="perfil" class="mr-3 p-3 pr-11 bg-green-600 text-white w-24 p-2 cursor-pointer transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" for="photo">Foto de Perfil</label>
        <input id="perfil" type="file" class="hidden" name="profilePhoto">
    </span>


    <span class="mt-4">
        <label for="bunner" class="mr-3 p-3 pr-11 bg-green-600 text-white w-24 p-2 cursor-pointer transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" for="photo">Foto Bunner </label>
        <input id="bunner" type="file" class="hidden" name="bannerPhoto">
    </span>


    <span class="flex mt-4">
        <input type="submit" value="Editar fotos" class="mr-2  bg-sky-600 text-white p-2 cursor-pointer transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">
        <a href="/site/<?= $site->slug; ?>" class="  bg-red-600 text-white p-2 cursor-pointer transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    </span>
</form>