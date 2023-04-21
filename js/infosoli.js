function pasarid(){
    const tablita = document.getElementById("tabla-soli");
    tablita.addEventListener('click',(e)=>{
        e.stopPropagation();
        var id_soli =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        var email =  e.target.parentElement.parentElement.parentElement.children[3].textContent;
        document.getElementsByName("id-soli")[0].value = id_soli;
        document.getElementsByName("correo-soli")[0].value = email;

    })
}

function pasaridsoli(){
    const tablita = document.getElementById("tabla-soli");
    tablita.addEventListener('click',(e)=>{
        e.stopPropagation();
        var id_soli =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        var email =  e.target.parentElement.parentElement.parentElement.children[3].textContent;
        document.getElementsByName("soli-id")[0].value = id_soli;
        document.getElementsByName("soli-correo")[0].value = email;
    })
}
