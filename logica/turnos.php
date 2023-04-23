<?php
    
    $Sesion = $_SESSION['id'];
    $sentencia = $conexion->query("SELECT ID_Paciente FROM paciente WHERE ID_User = $Sesion");
    $registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $ID_Paciente = 0;
    foreach($registro as $reg){
        $ID_Paciente = $reg['ID_Paciente']; 
    };

?>

<script>
  let ID_Paciente = <?php echo $ID_Paciente; ?>;
  let turnoActual = 1;
  let suTurno = 0;
  let turnosFaltantes = 0;

  <?php 

    $tratamiento = $_SESSION['tratamiento'];
    $tipo = $_SESSION['tipo'];
    $sentencia2 = "";
    switch($tipo){
      case 4: $sentencia2 = $conexion->prepare("SELECT * FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $tratamiento AND ID_Estado_Cita != 3 ORDER BY Orden");
              break;
      default: $sentencia2 = $conexion->prepare("SELECT * FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $tratamiento ORDER BY ID_Estado_Cita AND Orden");
               
    }
    $sentencia2->execute(); 
  ?>

  let registroTotal = <?php echo json_encode($sentencia2->fetchAll(PDO::FETCH_ASSOC)); ?>;
  registroTotal.forEach(function(reg)
  {
    if(reg.ID_Estado_Cita == 1){
      turnoActual++;
    }
    turnosFaltantes++;
  
    if(reg.ID_Paciente == ID_Paciente){
      suTurno = turnosFaltantes;
    }
  });

  document.getElementById("turnoActual").value = turnoActual;
  if(<?php echo $tipo; ?> == 4){
    if(suTurno == 0){
      tipoTratamiento = <?php echo $tratamiento; ?> == 3 ? "Radioterapia" : "Quimioterapia"; 
      document.getElementById("suTurno").value = `No tiene cita de ${tipoTratamiento}`;
    } else {
      document.getElementById("suTurno").value = suTurno;
    }
  }

</script>