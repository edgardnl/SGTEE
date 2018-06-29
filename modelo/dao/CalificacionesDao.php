<?php
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CalificacionesObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/CalificacionesSql.php";

class CalificacionesDao{
	
	private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function traeCalificacionesPorIdAlumno($obj){
    	$datosArray = array($obj->matricula_alumno);
        $pP = procesaParametros::PrepareStatement(CalificacionesSql::treaCalificacionesPorIdAlumno(),$datosArray);
       
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new CalificacionesObjeto();
            $lista[$x]->id_calificiones = $row['id_calificiones'];
            $lista[$x]->asignatura = $row['asignatura'];
            $lista[$x]->parcial = $row['parcial'];
            $lista[$x]->nomProfesor = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];
            $lista[$x]->calificaciones = $row['calificacion'];                        
            $x++;
        }
        return $lista;
    }

    function guardaCalificaciones($obj){

        $datosArray = array($obj->id_asignatura,$obj->id_parcial,$obj->id_profesor,$obj->matricula_alumno,$obj->calificaciones);
        $pP = procesaParametros::PrepareStatement(CalificacionesSql::guardaCalificaciones(),$datosArray); 

        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }

    }
}