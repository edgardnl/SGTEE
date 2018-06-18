<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

//estructura 

class MostrarTablaControlCoordinador1 {

	function tablaAlumnosCoordinador1(){
		$alumnosBo = new ModuloCoordinador1();// acceso a mi estructura bo
		$alumnos= $alumnosBo->ConsultarAlumnosCordinador1();
        print $alumnos;
	}
	
	function mostrarDatosalumId($id){
        $obj = new AlumnosObjeto();
        $obj->id = $id;
        $bo = new ModuloCoordinador1();
        return $bo->traeAlumnosPorId($obj);
    }

}

