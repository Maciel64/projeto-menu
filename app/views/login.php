<div class="flex w-full h-full">
    <section class=" flex justify-center items-center lg:h-full lg:w-1/2 lg:bg-white lg:flex lg:justify-center  lg:items-center">
        <img src="" alt="">       
        <form action="/login" method="POST" class="flex flex-col items-center">
            
            <?= getFlash("success"); ?>
            <?= getFlash("error"); ?>
            
            <div class="p-4 m-1 ml-0 ">
                <span class="material-icons">
                    mail_outline
                </span>

                <label for="email"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Email" id="email" type="email" name="email">

            </div>

            <div class="p-4 m-1 ml-0">
                <span class="material-icons">
                    lock_open
                </span>

                <label for="passwd"></label>
                <input class="rounded-lg w-80 h-10 py-2 px-2 border-2 border-black" placeholder="Senha" id="passwd" type="password" name="passwd">
            </div>


            <div class=" p-4">
                <a href="/recuperar" class="block">Esqueci minha senha</a>
                <a class="lg:hidden" href="/cadastrar">Cadastrar-se</a>
            </div>

            <div class="mx-auto">
                <input class=" w-36 h-10 bg-sky-600 text-white p-2 transition-all hover:bg-sky-700 hover:drop-shadow-lg rounded-3xl border-black border-solid" type="submit" value="Logar-se">
            </div>
        </form>

    </section>

    <section class="hidden lg:flex  lg:flex-col lg:justify-center lg:bg-green-800 lg:w-1/2 lg:align-items lg:items-center">

        <h1 class=" justify-center text-white text-5xl ">Bem vindo!</h1>

        <p class=" justify-center p-6  w-82 text-white ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium maxime consequuntur atque aliquam officia fuga inventore, quae quos velit saepe expedita consequatur tempora laudantium rerum? Quae voluptates repellat exercitationem officiis.</p>

        <a class="py-3 px-6 w-fit h-fit cadastrar justify-center text-white border-solid border-2 rounded-3xl " href="/cadastrar">Cadastrar-se</a>

    </section>
</div>