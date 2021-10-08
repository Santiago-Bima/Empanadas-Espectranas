// Movimiento de cinta de opciones 
var etiqueta_opciones=document.querySelector(".etiqueta_opciones");
var etiqueta=document.querySelector(".etiqueta");
var opciones=document.querySelector("#lista_de_opciones");
etiqueta_opciones.addEventListener("click", ()=>{
    etiqueta.classList.toggle('activado');
    etiqueta_opciones.classList.toggle('activado');
    opciones.classList.toggle('activado')
})