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



// vista productos
var productos=document.querySelectorAll(".producto");
var cierre=document.querySelectorAll(".cruz");
var editar=document.querySelectorAll(".editProd");
var eliminar=document.querySelectorAll(".elimProd");
var elimIcono=document.querySelectorAll(".elimProdIcon");

// precio
var precio=document.querySelectorAll(".precio");
var cant=document.querySelectorAll(".cant");
var precio_escondido=document.querySelectorAll(".precio_escondido");
var a_carrito=document.querySelectorAll(".agregar_carrito");

//carrito
var lista=document.querySelector(".lista");
var total=document.querySelector(".total");
var total_e=document.querySelector("#total");
var borrarLista=document.querySelector("#borrar_carrito");

for(let i=0; i<productos.length; i++){
    productos[i].addEventListener("click", ()=>{
        productos.forEach(producto=>{
            producto.classList.remove("viendo");
        })
        cierre.forEach(cruz=>{
            cruz.classList.remove('viendo');
        })
        editar.forEach(edit=>{
            edit.classList.remove('viendo');
        })
        eliminar.forEach(elim=>{
            elim.classList.remove('viendo');
        })
        elimIcono.forEach(icon=>{
            icon.classList.remove('viendo');
        })
        productos[i].classList.toggle("viendo");
        cierre[i].classList.toggle("viendo");
        editar[i].classList.toggle("viendo");
        eliminar[i].classList.toggle("viendo");
        elimIcono[i].classList.toggle("viendo");

        cant[i].addEventListener("change", ()=>{
            cantidad=cant[i].value;
            valorPrecio=precio_escondido[i].value;
            total_producto=cantidad*valorPrecio;
            precio[i].innerText='Precio: $'+total_producto;
        })

        a_carrito[i].addEventListener("click", (e)=>{
            e.preventDefault();
            totalActual=parseInt(total_e.value);
            total_producto=parseInt(total_producto)
            totalNuevo=totalActual+total_producto;
            total_e.value=totalNuevo;
            total.innerText='Total: $'+totalNuevo;
            listaActual=lista.innerText;
            
            if(cantidad!=0){
                document.querySelector("#compra_carrito").innerHTML=`<a style='color: #2f3235; text-decoration: none' href='https://www.paypal.com/signin'>Comprar</a>`
                if(listaActual=="No ingresaste ningun producto"){
                    listaActual='';
                }
                lista.innerText=listaActual+cantidad+'  '+productos[i].querySelector(".nombre").innerText+'\n';
            }

            cant[i].value='';
            precio[i].innerText='Precio: $0'
            cantidad=0;
            total_producto=0;
        })

        window.onbeforeunload = function(e) {
            total_e.value=0;
            lista.innerText="";
            cant[i].value='';
            precio[i].innerText='Precio: $0'
            total_producto=0;
            cantidad=0;
        };
        
    })
    cierre.forEach(cruz=>{
        cruz.addEventListener("click", ()=>{
            productos.forEach(producto=>{
                producto.classList.remove("viendo");
                cant[i].value='';
                precio[i].innerText='Precio: $0';
                total_producto=0;
                cantidad=0;
            })
        })
    })
}


borrarLista.addEventListener("click", ()=>{
    total.innerText='Total: $0';
    total_e.value=0;
    lista.innerText="No ingresaste ningun producto";
    total_producto=0;
    cantidad=0;
})





// Apertura de carrito
var carrito=document.querySelector("#carrito");
var cont_carrito=document.querySelector(".contenedor_carrito");
carrito.addEventListener('click', ()=>{
    carrito.classList.toggle("activado");
    cont_carrito.classList.toggle("activado");
})


var ham_carrito=document.querySelector("#ham_carrito");
var ham_cont_carrito=document.querySelector(".ham_contenedor_carrito");
ham_carrito.addEventListener('click', ()=>{
    ham_carrito.classList.toggle("activado");
    ham_cont_carrito.classList.toggle("activado");
})