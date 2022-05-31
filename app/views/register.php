<div class="flex w-full h-full">

    <section class="hidden lg:flex lg:flex-col lg:justify-center lg:bg-green-800 lg:w-1/2 lg:align-items lg:items-center">

        <?= getFlash('error'); ?>
        <h1 class=" justify-center text-white text-5xl ">Olá amigo!</h1>

        <p class=" justify-center p-6  w-82 text-white ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium maxime consequuntur atque aliquam officia fuga inventore, quae quos velit saepe expedita consequatur tempora laudantium rerum? Quae voluptates repellat exercitationem officiis.</p>

        <a class="py-3 px-6 w-fit h-fit cadastrar justify-center text-white border-solid border-2 rounded-3xl " href="/entrar">Faça login</a>

    </section>


    <section class="flex justify-center items-center lg:h-full lg:w-1/2 lg:bg-white lg:flex lg:justify-center  lg:items-center">
        
        <form action="/register" method="POST" class="flex flex-col  ">
            
            <div class="p-4 m-1 ml-0 ">

                <label for="nome"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Nome completo" id="nome" type="text" name="nome">
            </div>

            <div class="p-4 m-1 ml-0 ">

                <label for="nome"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="CPF" id="nome" type="text" name="nome">
            </div>

            <div class="p-4 m-1 ml-0 ">

                <label for="telefone"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Telefone" id="telefone" type="number" name="telefone">
            </div>

            <div class="p-4 m-1 ml-0 ">
                <label for="email"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Email" id="email" type="email" name="email">
            </div>


            <div class="p-4 m-1 ml-0">

                <label for="passwd"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Senha" id="passwd" type="password" name="passwd">
            </div>

            <div class="p-4 m-1 ml-0">

                <label for="passwd"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Repetir Senha" id="passwd" type="password" name="passwd">
            </div>

            <div>
                <input class="block mr-auto ml-auto w-36 h-10 bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded-3xl border-black border-solid" type="submit" value="Cadastrar-se">
            </div>
        </form>
    </section>
    <script>
    </script>
</div>