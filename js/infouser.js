function llenardatos(){
    const tabla = document.getElementById("tabla-user");
    tabla.addEventListener('click',(e)=>{
        e.stopPropagation();
        var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        var nombre =  e.target.parentElement.parentElement.parentElement.children[1].textContent;
        var cedula =  e.target.parentElement.parentElement.parentElement.children[2].textContent;
        var email =  e.target.parentElement.parentElement.parentElement.children[4].textContent;
        document.getElementsByName("id-usuario")[0].value = id;
        document.getElementsByName("nombre-user")[0].value = nombre;
        document.getElementsByName("cedula-user")[0].value = cedula;
        document.getElementsByName("correo-user")[0].value = email;
         
    })
}

function deleteusario(){
    const tabla = document.getElementById('tabla-user');
    tabla.addEventListener('click',(e)=>{
        e.stopPropagation();
        var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        console.log(id);
        document.getElementsByName("delete")[0].value = id;
    })

}