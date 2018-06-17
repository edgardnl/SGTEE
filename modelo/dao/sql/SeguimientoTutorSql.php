<?php

class SeguimientoTutorSql{
	
	function traeSeguimientosAlumnoPorTutor() {
        $query = "SELECT seguimiento_tutor.id_seguimiento,relacion_alumno_tutor.id_alumno,alumno.nombre,alumno.ap_p,alumno.ap_m 
			FROM seguimiento_tutor,relacion_alumno_tutor,alumno,tutor
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.id_alumno = alumno.id_alumno
			AND relacion_alumno_tutor.id_tutor = tutor.id_tutores
			AND tutor.id_tutores = ?";
        return $query;
    }

    function traeSeguimientoDatosAlumnoTutor(){
    	$query = "SELECT seguimiento_tutor.id_seguimiento,seguimiento_tutor.programa, tutor.nombre, tutor.ap_p,tutor.ap_m,alumno.matricula,alumno.nombre as nombrea,alumno.ap_p as ap_pa,alumno.ap_m as ap_ma,alumno.semestre,alumno.carrera,alumno.grupo,alumno.correo,alumno.telefono,alumno.telefono_cel 
			FROM seguimiento_tutor,relacion_alumno_tutor,tutor,alumno
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.id_tutor = tutor.id_tutores
			AND relacion_alumno_tutor.id_alumno = alumno.id_alumno
			AND seguimiento_tutor.id_seguimiento = ?";
        return $query;	
    }
}