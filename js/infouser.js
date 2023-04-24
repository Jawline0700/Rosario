function llenardatos(){
    const tabla = document.getElementById("tabla-user");
    tabla.addEventListener('click',(e)=>{
        e.stopPropagation();
        console.log(e.target.parentElement.parentElement.parentElement);
        var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        var cedula = e.target.parentElement.parentElement.parentElement.children[2].textContent;
        var nombre =  e.target.parentElement.parentElement.parentElement.children[1].textContent;
        var email =  e.target.parentElement.parentElement.parentElement.children[4].textContent;
        var user = e.target.parentElement.parentElement.parentElement.children[5].textContent;
        document.getElementsByName("id-usuario")[0].value = id;
        document.getElementsByName("nombre-user")[0].value = nombre;
        document.getElementsByName("correo-user")[0].value = email;
        document.getElementsByName("cedula-user")[0].value = cedula;

        if(user == "Paciente"){
             $('#estado-editar').prop('disabled','disabled');
             $('#especial-editar').prop('disabled','disabled');
        }
        else{
            $('#estado-editar').prop('disabled',false);
            $('#especial-editar').prop('disabled',false);
        }
    
         
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