<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

//estructura 

class MostrarTablaControlAlumnos {

	function tablaAlumnos(){
		$alumnosBo = new ModuloAlumnos();// acceso a mi estructura bo
		$alumnos= $alumnosBo->ConsultarAlumnos();
        print $alumnos;
	}
	
	function mostrarDatosalumId($id){
        $obj = new AlumnosObjeto();
        $obj->matricula = $id;
        $bo = new ModuloAlumnos();
        return $bo->traeAlumnosPorId($obj);
    }

}







?>