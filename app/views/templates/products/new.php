<form id="form" action="/site/<?= $site->slug; ?>/category/<?= $category->id; ?>/product/new" method="POST" enctype="multipart/form-data" class="flex flex-col">
    <h1>Cadastrar novo produto</h1>

    <div>
        <label class="mr-3 p-3 pr-10" for="name">Nome do produto</label>
        <input class="border-black border-2 w-56 p-1 rounded-md" id="name" type="text" name="name">
    </div>

    <div class="pt-1 block lg:flex lg:justify-start">
        <label class="mr-3 p-3 " for="description">Descrição do produto</label>
        <textarea class="border-black border-2 w-56 p-1 rounded-md" name="description"></textarea>
    </div>

    <div class="pt-1">
        <label class="mr-3 p-3 pr-11" for="price">Preço do produto</label>
        <input class="border-black border-2 p-1 w-56 rounded-md" id="price" type="text" name="price">
    </div>

    <div class="pt-1 mt-4">
        <label class="mr-3 p-3 bg-green-600 text-white w-24 p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" for="photo">Foto do produto</label>
        <input class="hidden" type="file" name="photo" id="photo">
    </div>

    <?php if ($site->thirdyPartyDelivery) : ?>
        <label for="delivery">Produto a ser entregue por mim</label>
        <input type="radio" id="delivery" name="delivery">

        <label for="thirdyPartyDelivery">Produto a ser entregue por terceiros</label>
        <input type="radio" id="thirdyPartyDelivery" name="delivery">
        
        <label for="width">Largura</label>
        <input type="text" id="width" name="width" value="0">
        
        <label for="height">Altura</label>
        <input type="text" id="height" name="height" value="0">
        
        <label for="lenght">Comprimento</label>
        <input type="text" id="lenght" name="lenght" value="0">
        
        <label for="weight">Peso</label>
        <input type="text" id="weight" name="weight" value="0">
    <?php endif; ?>

    <a href="/site/<?= $site->slug; ?>" class="mt-3 bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit">Voltar</a>
    <input class="bg-green-600 text-white w-24 p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded" type="submit" value="Criar">
</form>

