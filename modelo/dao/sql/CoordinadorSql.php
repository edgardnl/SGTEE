<?php

class CoordinadorSql {
	
	function consultaUsuarioPass(){
		$query = "SELECT * FROM usuario WHERE matricula  = ? and contrasena = ?;";
		return $query;
	}

	function cosultaAlumnos(){
		$query = "SELECT * FROM alumno ;";
		return $query;	
	}

	function traeAlumnosCoordinador() {
        $query = "SELECT * FROM alumno;";
        return $query;
    }

    
    
    function traeCoordinadorPorId(){
        $query = "SELECT * from relacion_alumno_tutor where id_relacion = ?;";
        return $query;
    }
    
    function editaDatosCoordinador($obj){
        $query = "UPDATE relacion_alumno_tutor set id_alumno = '".$obj->id_alumno."'
        , id_tutor = '".$obj->id_tutor."'
        , aprobacion ='".$obj->aprobacion."'
        , observacion = '".$obj->observacion."'
        , estatus= '".$obj->estatuss."'
         where id_alumno= ".$obj->id_alumno.";";
        return $query;
    }
    
    function eliminaDatosCoordinador(){
        $query = "DELETE FROM relacion_alumno_tutor where id_relacion = ?;";
        return $query;
    }

}
?>