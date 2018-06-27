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

	function traeAlumnos() {
        $query = "SELECT * FROM alumno;";
        return $query;
    }

    function agregaAlumnossql() {
        $query = "INSERT INTO alumno(
        matricula,
        nombre,
        ap_p,
        ap_m,
        grupo,
        carrera,
        telefono,
        telefono_cel,
        semestre,
        correo,
        sexo,
        materias_adeudadas,
        estatus)values(?,?,?,?,?,?,?,?,?,?,?,?,?);";
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
        $query = "update alumno set nombre = '".$obj->nombre."'
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

    function cosultaMatricula(){
        $query = "SELECT COUNT(alumno.matricula) as nMatricula FROM alumno WHERE alumno.matricula = ? ;";
        return $query;#    
    }
    
    function buscarAlumnoLogin(){
        $query = "select * from alumno where alumno.matricula = ? and alumno.password = ?;";
        return $query;#    
    }
}
?>