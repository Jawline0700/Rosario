function MappearCita(){
    const tabla = document.getElementById("tabla-citas");
    tabla.addEventListener('click',(e)=>{
        e.stopPropagation();
        var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
        var maquina = e.target.parentElement.parentElement.parentElement.children[1].textContent;
        var cedula =  e.target.parentElement.parentElement.parentElement.children[2].textContent;
        var personalMedico =  e.target.parentElement.parentElement.parentElement.children[3].textContent;
        var estado =  e.target.parentElement.parentElement.parentElement.children[4].textContent;
        var turno =  e.target.parentElement.parentElement.parentElement.children[5].textContent;
    
        document.getElementById("id-cita").value = id;
        document.getElementById("cedula-cita").value = cedula;
        document.getElementById("turno-cita").value = turno;
   

        var selectMaquina = document.getElementById("selectMaquina");
        var contador = 0;
        while(selectMaquina.length > contador){
            if(selectMaquina.options[contador].text == maquina){
                selectMaquina.selectedIndex = contador;
            } 
            contador++;
        }
       
        var selectPersonalMedico = document.getElementById("selectPersonalMedico");
        var contador = 0;
        while(selectPersonalMedico.length > contador){
            if(selectPersonalMedico.options[contador].text == personalMedico){
                selectPersonalMedico.selectedIndex = contador;
            } 
            contador++;
        }

        var selectEstado = document.getElementById("selectEstado");
        var contador = 0;
        while(selectEstado.length > contador){
            if(selectEstado.options[contador].text == estado){
                selectEstado.selectedIndex = contador;
            } 
            contador++;
        }
        
    })
}