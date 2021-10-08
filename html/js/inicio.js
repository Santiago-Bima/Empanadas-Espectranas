// Movimiento de cinta de opciones 
var etiqueta_opciones=document.querySelector(".etiqueta_opciones");
var etiqueta=document.querySelector(".etiqueta");
var opciones=document.querySelector("#lista_de_opciones");
etiqueta_opciones.addEventListener("click", ()=>{
    etiqueta.classList.toggle('activado');
    etiqueta_opciones.classList.toggle('activado');
    opciones.classList.toggle('activado')
})


// Apertura de menu
var menu=document.querySelector(".menu_drop");
var cont_menu=document.querySelector(".menu_items_drop");
var flecha_menu=document.querySelector(".menu_drop_js");
menu.addEventListener("click", ()=>{
    menu.classList.toggle("activado");
    cont_menu.classList.toggle("activado");
    flecha_menu.classList.toggle("activado");
})
document.querySelectorAll(".menu__drop__texto").forEach(link=>{
    link.addEventListener('click', ()=>{
        menu.classList.toggle("activado");
        cont_menu.classList.toggle("activado");
        flecha_menu.classList.toggle("activado");
    })
})




// Apertura de carrito
var carrito=document.querySelector("#carrito");
var cont_carrito=document.querySelector(".contenedor_carrito");
carrito.addEventListener('click', ()=>{
    carrito.classList.toggle("activado");
    cont_carrito.classList.toggle("activado");
})