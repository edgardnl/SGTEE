<?php

class AlumnosSql {
	
	function consultaUsuarioPass(){
		$query = "SELECT * FROM usuario WHERE matricula  = ? and contrasena = ?;";
		return $query;
	}

	function cosultaAlumnos(){
		$query = "SELECT * FROM alumno ;";
		return $query;	
	}
}
?>