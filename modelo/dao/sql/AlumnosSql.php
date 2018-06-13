<?php

class AlumnosSql {
	
	function consultaUsuarioPass(){
		$query = "SELECT * FROM usuario WHERE usuario  = ? and contrasena = ?;";
		return $query;
	}
}
?>