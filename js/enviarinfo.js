const tabla = document.getElementById('tabla');
const modal = document.getElementById('myModal3');


tabla.addEventListener('click',(e)=>{
    e.stopPropagation();
    console.log(e.target.parentElement.parentElement.parentElement.children);
    var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
    var cedula = e.target.parentElement.parentElement.parentElement.children[1].textContent;
    document.getElementsByName("cedula-editar")[0].value = cedula;
    document.getElementsByName("id-cita")[0].value = id;
    varible = "<?php echo $_SESSION['tipo']?>";
})




