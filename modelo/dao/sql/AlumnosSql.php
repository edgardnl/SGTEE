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
        password,
        id_role,
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
        estatus)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        return $query;
    }


    function traeAlumnoPorClaveAlumnos(){
        $query = "SELECT * FROM alumno WHERE matricuala = ? ;";
        return $query;
    }
    
    function traeAlumnosPorIdAlumnos(){
        $query = "SELECT * FROM alumno WHERE matricula = ? ;";
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
         where matricula = ".$obj->matricula.";";
        return $query;
    }
    
    function eliminaDatosAlumnos(){
        $query = "delete from alumno where matricula = ?;";
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
    
    function actualizaStatusAlum(){
        $query = "update alumno set alumno.estatus = ? where alumno.matricula = ?;";
        return $query;#    
    }

    function consultaAlumnosDetalle(){
        $query = "SELECT alumno.matricula, alumno.nombre, alumno.ap_p, alumno.ap_m, alumno.carrera, alumno.materias_adeudadas,relacion_alumno_tutor.observacion, tutor.nombre as nomtuto, tutor.ap_p as aptuto, tutor.ap_m as amtuto, tutor.telefono_cel, tutor.correo
            FROM alumno, relacion_alumno_tutor, tutor
            WHERE alumno.matricula = relacion_alumno_tutor.matricula_alumno
            AND relacion_alumno_tutor.matricula_tutor = tutor.matricula
            AND alumno.matricula = ?;";
        return $query;#       
    }

    function editaPass(){
        $query = "UPDATE alumno SET alumno.password = ? WHERE alumno.matricula = ?;";
        return $query;#       
    }
}
?>