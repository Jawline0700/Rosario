<?php
    
  $Sesion = $_SESSION['id'];
  $tratamiento = $_SESSION['tratamiento'];
  $tipo = $_SESSION['tipo'];
  $sentencia = $conexion->query("SELECT ID_Usuario FROM Usuario WHERE ID_Usuario = $Sesion");
  $registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

  $ID_Paciente = 0;
  foreach($registro as $reg){
      $ID_Paciente = $reg['ID_Usuario']; 
  };

?>

<script>
  let ID_Paciente = <?php echo $_SESSION['id']; ?>;
  let turnoActual = 0;
  let suTurno = 0;

  <?php 
    $sentencia = $conexion->prepare("SELECT Orden FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $tratamiento AND ID_Estado_Cita = 2 ORDER BY Orden DESC LIMIT 1");
    $sentencia->execute();

    if($sentencia->rowCount()==0){
      $sentencia = $conexion->prepare("SELECT Orden FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $tratamiento AND ID_Estado_Cita = 3 ORDER BY Orden ASC LIMIT 1");
      $sentencia->execute();
    }
  ?>

  let buscarTurnoActual = <?php echo json_encode($sentencia->fetchAll(PDO::FETCH_ASSOC)); ?>;
  buscarTurnoActual.forEach(function(reg)
  {
    turnoActual = reg.Orden;
  });

  document.getElementById("turnoActual").value = turnoActual == 0 ? "Todas las Citas han sido atendidas" : turnoActual;
  if(<?php echo $tipo; ?> == 4){
    <?php 
      $sentencia2 = $conexion->prepare("SELECT Orden FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $tratamiento AND ID_Paciente = $ID_Paciente ORDER BY ID_Estado_Cita ASC, Orden DESC LIMIT 1");
      $sentencia2->execute();
    ?>
    
    let buscarSuTurno = <?php echo json_encode($sentencia2->fetchAll(PDO::FETCH_ASSOC)); ?>;
    buscarSuTurno.forEach(function(reg)
    {
      suTurno = reg.Orden;
    });

    var tipoTratamiento;
    if(suTurno == 0){
      switch(<?php echo $tratamiento ?>){
        case 1: tipoTratamiento = "Revisión";
                break;
        case 2: tipoTratamiento = "Quimioterapia";
                break;
        default: tipoTratamiento = "Radioterapia";
                break;
      }
      document.getElementById("suTurno").value = `No tiene cita de ${tipoTratamiento}`;
    } else {
      document.getElementById("suTurno").value = suTurno;
    }
  }

</script>