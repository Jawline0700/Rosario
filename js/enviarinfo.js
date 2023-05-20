const tabla = document.getElementById('tabla');
const modal = document.getElementById('myModal3');


tabla.addEventListener('click',(e)=>{
    e.stopPropagation();

    var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
    var cedula = e.target.parentElement.parentElement.parentElement.children[1].textContent;
    var nombreMedico =  e.target.parentElement.parentElement.parentElement.children[2].textContent;
    var tipo = e.target.parentElement.parentElement.parentElement.children[3].textContent;
    var fecha =  e.target.parentElement.parentElement.parentElement.children[4].textContent;
    var estado =  e.target.parentElement.parentElement.parentElement.children[5].textContent;
    document.getElementsByName("cedula-editar")[0].value = cedula;
    document.getElementsByName("id-cita")[0].value = id;
    document.getElementsByName("fecha-editar")[0].value = fecha;

    // Select del Médico
    var selectMedico = document.getElementById("selectMedico");
    var contador = 0;
    while(selectMedico.length > contador){
        if(selectMedico.options[contador].text == nombreMedico){
            selectMedico.selectedIndex = contador;
        } 
        contador++;
    }

    // Select del Tipo de Tratamiento
    var selectTratamiento = document.getElementById("selectTratamiento");
    contador = 0;
    while(selectTratamiento.length > contador){
        if(selectTratamiento.options[contador].text == tipo){
            selectTratamiento.selectedIndex = contador;
        } 
        contador++;
    }

    // Select del Estado de la Cita
    var selectEstado = document.getElementById("selectEstado");
    contador = 0;
    while(selectEstado.length > contador){
        if(selectEstado.options[contador].text == estado){
            selectEstado.selectedIndex = contador;
        } 
        contador++;
    }

    varible = "<?php echo $_SESSION['tipo']?>";
})




