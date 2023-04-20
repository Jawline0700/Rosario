<?php 

class cita{
    public $Fecha;
    public $ID_Paciente;
    public $ID_Medico;
    public $ID_Tipo_Tratamiento;
    public $ID_Estado_Cita;


    function __construct($f,$idpa,$idme,$idtrata,$estado_cita){
        $this->Fecha = $f;
        $this->ID_Paciente = $idpa;
        $this->ID_Medico = $idme;
        $this->ID_Tipo_Tratamiento = $idtrata;
        $this->ID_Estado_Cita = $estado_cita;
    }
}





?>