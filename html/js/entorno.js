// Apertura de opciones
var ham=document.querySelector(".ham");
var cont_ham_opciones=document.querySelector(".ham_options");

// Apertura de menu hamburguer
var menu=document.querySelector(".ham_menu_drop");
var cont_menu=document.querySelector(".ham_menu_items_drop");
var flecha_menu=document.querySelector(".ham_menu_drop_js");

// Apertura de opciones
ham.addEventListener('click', ()=>{
    ham.classList.toggle("activado");
    cont_ham_opciones.classList.toggle("activado");
    if(ham.classList.contains("activado")){
        //pass
    }else{
        if(menu.classList.contains("activado")){
            menu.classList.remove("activado");
            cont_menu.classList.remove("activado");
            flecha_menu.classList.remove("activado");
        }
    }
})

// Apertura de menu hamburguer
menu.addEventListener("click", ()=>{
    menu.classList.toggle("activado");
    cont_menu.classList.toggle("activado");
    flecha_menu.classList.toggle("activado");
})
document.querySelectorAll(".ham__menu__drop__texto").forEach(link=>{
    link.addEventListener('click', ()=>{
        menu.classList.remove("activado");
        cont_menu.classList.remove("activado");
        flecha_menu.classList.remove("activado");
        ham.classList.remove("activado");
        cont_ham_opciones.classList.remove("activado");
    })
})

