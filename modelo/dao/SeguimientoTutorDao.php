<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/SeguimientoTutorObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/SeguimientoTutorSql.php";

class SeguimientoTutorDao{
	
	private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function traeSeguimientoAlumnosPorTutor($obj){
    	$datosArray = array($obj->id_tutor);
        $pP = procesaParametros::PrepareStatement(SeguimientoTutorSql::traeSeguimientosAlumnoPorTutor(),$datosArray);
       
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new SeguimientoTutorObjeto();
            $lista[$x]->id_seguimiento = $row['id_seguimiento'];
            $lista[$x]->matricula = $row['matricula_alumno'];
            $lista[$x]->nomAlumno = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];         
            $x++;
        }
        return $lista;
    }

    function traSeguimientoDatosTutorAlumno($obj){
        $datosArray = array($obj->id_seguimiento);
        $pP = procesaParametros::PrepareStatement(SeguimientoTutorSql::traeSeguimientoDatosAlumnoTutor(),$datosArray);
       
        $query = $this->con->query($pP);        
        $row = $query->fetch_array();
        
        $lista = new SeguimientoTutorObjeto();
        $lista->id_seguimiento = $row['id_seguimiento'];
        $lista->programa = $row['programa'];
        $lista->nomTutor = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];
        $lista->matricula = $row['matricula'];
        $lista->nomAlumno = $row['nombrea']." ".$row['ap_pa']." ".$row['ap_ma'];
        $lista->semestre = $row['semestre'];         
        $lista->carrera = $row['carrera'];
        $lista->grupo = $row['grupo'];
        $lista->correo = $row['correo'];
        $lista->telefono = $row['telefono'];
        $lista->telefono_cel = $row['telefono_cel'];
        return $lista;   
    }

    function agregaSeguimiento($obj){
        $datosArray = array($obj->id_relacion);
        $pP = procesaParametros::PrepareStatement(SeguimientoTutorSql::agregaSeguimiento(),$datosArray); 

        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
}