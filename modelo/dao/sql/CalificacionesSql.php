<?php

class CalificacionesSql{
	
	function treaCalificacionesPorIdAlumno(){
		$query = "SELECT calificaciones.id_calificiones,asignatura.asignatura,parcial.parcial,profesores.nombre,profesores.ap_p,profesores.ap_m,calificaciones.calificacion 
			FROM calificaciones,asignatura,profesores,alumno,parcial
			WHERE calificaciones.id_asignatura = asignatura.id_asignatura
			AND calificaciones.id_profesor = profesores.id_profesor
            AND calificaciones.id_parcial = parcial.id_parcial
			AND calificaciones.id_alumno = alumno.id_alumno
			AND alumno.id_alumno = ?";
		return $query;
	}
}