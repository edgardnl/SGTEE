<?php

class SeguimientoTutorSql{
	
	function traeSeguimientosAlumnoPorTutor() {
        $query = "SELECT seguimiento_tutor.id_seguimiento, relacion_alumno_tutor.matricula_alumno, alumno.nombre, alumno.ap_p, alumno.ap_m
			FROM seguimiento_tutor,relacion_alumno_tutor,alumno,tutor
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.matricula_alumno = alumno.matricula
			AND relacion_alumno_tutor.matricula_tutor = tutor.matricula
			AND tutor.matricula = ?;";
        return $query;
    }

    function traeSeguimientoDatosAlumnoTutor(){
    	$query = "SELECT seguimiento_tutor.id_seguimiento, seguimiento_tutor.programa, tutor.nombre, tutor.ap_p, tutor.ap_m, alumno.matricula, alumno.nombre as nombrea, alumno.ap_p as ap_pa, alumno.ap_m as ap_ma, alumno.semestre, alumno.carrera, alumno.grupo, alumno.correo, alumno.telefono, alumno.telefono_cel  
			FROM seguimiento_tutor, relacion_alumno_tutor, tutor, alumno
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.matricula_tutor = tutor.matricula
			AND relacion_alumno_tutor.matricula_alumno = alumno.matricula
			AND seguimiento_tutor.id_seguimiento = ?;";
        return $query;	
    }

    function agregaSeguimiento(){
    	$query = "INSERT INTO seguimiento_tutor(id_relacion, programa, estado) VALUES (?,'Tutoria Individual','Activo');";
    	return $query;
    }
}