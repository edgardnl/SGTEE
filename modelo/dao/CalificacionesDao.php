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
    	$datosArray = array($obj->id_alumno);
        $pP = procesaParametros::PrepareStatement(CalificacionesSql::treaCalificacionesPorIdAlumno(),$datosArray);
       
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new CalificacionesObjeto();
            $lista[$x]->id_calificiones = $row['id_calificiones'];
            $lista[$x]->asignatura = $row['asignatura'];
            $lista[$x]->id_parcial = $row['id_parcial'];
            $lista[$x]->nomProfesor = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];
            $lista[$x]->calificaciones = $row['calificacion'];                        
            $x++;
        }
        return $lista;
    }
}