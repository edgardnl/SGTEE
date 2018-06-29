<?php

class CalificacionesSql{
	
	function treaCalificacionesPorIdAlumno(){
		$query = "SELECT calificaciones.id_calificiones,asignatura.asignatura,parcial.parcial,profesores.nombre,profesores.ap_p,profesores.ap_m,calificaciones.calificacion 
			FROM calificaciones,asignatura,profesores,alumno,parcial
			WHERE calificaciones.id_asignatura = asignatura.id_asignatura
			AND calificaciones.id_profesor = profesores.id_profesor
            AND calificaciones.id_parcial = parcial.id_parcial
			AND calificaciones.matricula_alumno = alumno.matricula
			AND alumno.matricula = ?;";
		return $query;
	}

	function guardaCalificaciones(){
		$query = "INSERT INTO calificaciones(id_asignatura, id_parcial, id_profesor, matricula_alumno, calificacion) VALUES (?,?,?,?,?);";
		return $query;
	}
}