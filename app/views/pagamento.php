<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/static/css/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
  </head>
  
  <!--flex justify-center -->
  
  <body class="text-lg bg-slate-100 w-full  ">
    <div class=" grid row-span-1 lg:flex overflow-x-hidden lg:justify-center " >
        <section
        class="w-10/12  lg:flex lg:justify-center lg:flex-col border-black p-20 mt-8 border-r-2"
        >
        <h2 class="flex justify-center">Revisar produtos</h2>
        <?php foreach ($products as $index => $product) : ?>
            <div class="w-11/12 my-5 lg:w-full drop-shadow bg-white rounded p-2">
                <img class="block" src="/upload/<?= $product->photo; ?>" alt="<?= $product->name; ?>">
                <hr>

                <p class="p-1 ">
                <h2 class="text-cyan-600"><?= $product->name; ?></h2>
                </p>
                <p class="p-1 "><span class="text-sm">R$<?= $product->price; ?> </span> </p>
                <p class="p-1 text-sm text-slate-600"><span class="text-sm "><?= $product->description; ?> </span></p>
                <input type="number" value="<?= $product->quantity; ?>" placeholder="Quantidade do produto" name="product-<?= $product->id; ?>">
            </div>
        <?php endforeach; ?>
        </section>

        <!-- ==========================ENTREGA=====================================-->
        
            <!---->
            <section class="border-black p-0 lg:p-9 border-r-2 mt-8 lg:flex lg:justify-center lg:flex-col">
            <h2 class="flex justify-center">Frete e entrega</h2>
            <p>
                <label class="">
                <input
                    class="w-4 ml-1 h-4 retirarLocal mt-12 pb-10"
                    name="entrega"
                    type="radio"
                />
                <span>Retirar no local</span>
                </label>
            </p>
            <p>
                <label>
                <input class="entrega ml-1 w-4 h-4" name="entrega" type="radio" checked />
                <span>Entrega</span>
                </label>
            </p>
            <div class="teste"></div>
            <div class="flex justify-center mt-10">
                <form class="formulario-entrega " action="#">
                <div class="w-10/12 lg:w-full h-12 flex justify-center">
                    <input
                    class="dados-local cep w-full h-12 border-slate-500 border-b-2 rounded"
                    type="text"
                    class="validate"
                    placeholder="Nome completo"
                    />
                </div>
                <div class="w-10/12 lg:w-full h-12 flex justify-center pt-4">
                    <input
                    class="dados-local cep w-96 h-12 border-slate-500 border-b-2 rounded"
                    type="text"
                    class="validate"
                    placeholder="CEP"
                    />
                </div>
                <div class="w-10/12 lg:w-96 h-12 flex justify-center pt-8">
                    <input
                    class="dados-local bairro h-12 w-96 border-slate-500 border-b-2 rounded"
                    type="text"
                    class="validate"
                    placeholder="Bairro"
                    size="3"
                    />
                </div class="">
                <div class="ruaNumero w-9/12  lg:w-96 flex justify-center pt-12">
                    <div class="">
                    <input
                        class="Rua w-64 h-12 border-slate-500 border-b-2 rounded"
                        type="text"
                        class="validate"
                        placeholder="Rua"
                    />
                    </div>
                    <div class="">
                    <input
                        class="numero w-full lg:w-32 ml-1 h-12 border-slate-500 border-b-2 rounded"
                        type="number"
                        class="numero"
                        placeholder="Nº"
                        min="0"
                        max="9999"
                    />
                    </div>
                </div>
                <div class="w-10/12 lg:w-96 flex justify-center pt-4">
                    <input
                    class="dados-local bairro w-96 h-12 border-slate-500 border-b-2 rounded"
                    type="text"
                    class="validate"
                    placeholder="Complemento"
                    />
                </div>
                <a
                    class="bg-sky-600 mt-10 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit cursor-pointer"
                    >Salvar endereço</a
                >
                </form>
            </div>
            </section>
        

        <!-- ==========================pagamento====================================-->


        <section class="p-16 border-r-2 mt-8 lg:flex lg:justify-center lg:flex-col">
        <h2 class="flex justify-center">Pagamento</h2>

        
        <p>
            <label>
            <input class="cartao w-4 h-4 retirarLocal mt-10 pb-5" name="Pagamento" type="radio" checked />
            <span>Cartão de Crédito</span>
            </label>
        </p>
        <p>
            <label>
            <input class="boleto w-4 h-4 retirarLocal mt-5 pb-5" name="Pagamento" type="radio" />
            <span>Boleto</span>
            </label>
        </p>
        <p>
            <label>
            <input class="pix w-4 h-4 retirarLocal mt-5 pb-5" name="Pagamento" type="radio" />
            <span>Pix</span>
            </label>
        </p>

        <!--============Cartão======================-->
        
        <div class="flex justify-center mt-10">
            <form class="formulario-pagamento" action="#">
            
            <div class="w-full h-12 flex justify-center pt-4">
                <input
                class="dados-local cep w-full h-12 border-slate-500 border-b-2 rounded"
                type="number"
                class="validate"
                placeholder="Número do cartão"
                />
            </div>
            
            <div class="w-full h-12 flex justify-center pt-8">
                <input
                class="dados-local cep w-full h-12 border-slate-500 border-b-2 rounded"
                type="text"
                class="validate"
                placeholder="Nome completo"
                />
            </div>
            
            <div class="ruaNumero w-full h-12 flex justify-center pt-12">
                <div class="">
                <input
                    class="Rua w-full h-12 border-slate-500 border-b-2 rounded"
                    type="number"
                    class="validate"
                    placeholder="Validade (dd/mm/aaaa)"
                />
                </div>
                
                
                <div class="ml-10">
                <input
                    class="numero w-full h-12  border-slate-500 border-b-2 rounded"
                    type="number"
                    placeholder="CVV"
                    min="0"
                    max="9999"
                />
                </div>
            
            </div>
            
            
            <div class="mt-12">
                <a
                class="bg-sky-600 block mt-10 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded inline-block w-fit cursor-pointer"
                >Salvar dados</a
                >
                <a
                class="bg-green-600 block mt-10 text-white p-2 transition-all hover:bg-green-700 hover:drop-shadow-lg rounded inline-block w-fit cursor-pointer"
                >Finalizar compra</a
                >
            </div>
            
            </form>
        </div>
        <a class="ml-5 bg-red-600 block mt-10 text-white p-2 transition-all hover:bg-red-700 hover:drop-shadow-lg rounded inline-block w-fit cursor-pointer">cancelar</a>
        </section>
    </div>
    <script src="/static/js/pagamento.js"></script>
  </body>
</html>