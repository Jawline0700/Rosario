<?php 

class cita{
    public $Fecha;
    public $ID_Paciente;
    public $ID_Medico;
    public $ID_Tipo_Tratamiento;
    public $ID_Estado_Cita;
    public $Orden;

    function __construct($f,$idpa,$idme,$idtrata,$estado_cita,$orden){
        $this->Fecha = $f;
        $this->ID_Paciente = $idpa;
        $this->ID_Medico = $idme;
        $this->ID_Tipo_Tratamiento = $idtrata;
        $this->ID_Estado_Cita = $estado_cita;
        $this->Orden = $orden;
    }
}





?>