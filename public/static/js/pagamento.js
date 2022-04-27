const tirar_local = document.querySelector(".retirarLocal")
const entregar = document.querySelector(".entrega")
const boleto = document.querySelector(".boleto")
const cartao = document.querySelector(".cartao")
const pix = document.querySelector(".pix")

entregar.addEventListener("click", function(){
    document.querySelector(".formulario-entrega").style.display = "block";
    console.log("deu certo");
})
//faz sumir a opção entrega
tirar_local.addEventListener("click", function () {
    document.querySelector(".formulario-entrega").style.display = "none";
})

//faz sumir as outras opções de pagamento 
boleto.addEventListener("click", function () {
    document.querySelector(".formulario-pagamento").style.display = "none";
})

cartao.addEventListener("click", function () {
    document.querySelector(".formulario-pagamento").style.display = "block";
})

pix.addEventListener("click", function () {
    document.querySelector(".formulario-pagamento").style.display = "none";
})

console.log("olá mundo")