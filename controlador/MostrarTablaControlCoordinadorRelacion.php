<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorRelacionBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

//estructura 

class MostrarTablaControlCoordinadorRelacion {

	function tablaCoordindorRelacion(){
		$alumnosBo = new ModuloRelacion_Alumno_Tutor();// acceso a mi estructura bo
		$alumnos= $alumnosBo ->ConsultarCoordinadorRelacion();
        print $alumnos;
	}
	
}
