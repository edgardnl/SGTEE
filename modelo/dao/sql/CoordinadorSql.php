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

    function agregaAlumnossql() {
        $query = "INSERT INTO alumno(matricula,nombre,ap_p,ap_m,grupo,carrera,telefono,telefono_cel,semestre,correo,sexo)values(?,?,?,?,?,?,?,?,?,?,?);";
        return $query;
    }


    function traeAlumnoPorClaveAlumnos(){
        $query = "SELECT * FROM alumno WHERE matricuala = ? ;";
        return $query;
    }
    
    function traeAlumnosPorIdAlumnos(){
        $query = "SELECT * FROM alumno WHERE id_alumno = ? ;";
        return $query;
    }
    
    function editaDatosAlumnoss($obj){
        $query = "update alumno set matricula = '".$obj->matricula."'
        , nombre = '".$obj->nombre."'
        , ap_p = '".$obj->ap_p."'
        , ap_m = '".$obj->ap_m."'
        , grupo = '".$obj->grupo."'
        , carrera = '".$obj->carrera."'
        , telefono = '".$obj->telefono."'
        , telefono_cel = '".$obj->telefono_cel."'
        , semestre= '".$obj->semestre."'
        , correo= '".$obj->correo."'
        , sexo= '".$obj->sexo."'
         where id_alumno = ".$obj->id.";";
        return $query;
    }
    
    function eliminaDatosAlumnos(){
        $query = "delete from alumno where id_alumno = ?;";
        return $query;# 
    }
}
?>