var inputSearch=document.getElementById('buscador');
var box_search=document.getElementById('box-search');

document.getElementById('buscador').addEventListener('keyup', buscador);
function buscador(){
    filter=inputSearch.value.toUpperCase();
    li=box_search.getElementsByTagName('li');
    for(i=0; i<li.length; i++){
        a=li[i].getElementsByTagName('a')[0];
        textValue=a.textContent || a.innerText;
    
        if(textValue.toUpperCase().indexOf(filter)>-1){
            li[i].style.display="";
            box_search.style.display='block';

            
            if(inputSearch.value===""){
                box_search.style.display='none';
            }
            
        }else{
            li[i].style.display="none";
        }
    }
}
