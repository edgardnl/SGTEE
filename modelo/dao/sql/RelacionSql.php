<?php

class RelacionSql {

    function consultaRelacionesNombres() {
        $query = "SELECT id_relacion,tutor.nombre as nomtuto,tutor.ap_p as apatuto,tutor.ap_m as apmtuto,alumno.nombre as nomalu,alumno.ap_p as apaalu,alumno.ap_m as apmalu FROM relacion,tutor,alumno
			WHERE relacion.id_tutor = tutor.id_tutores
			and relacion.id_alumno = alumno.id_alumno;";
        return $query;
    }

    function consultaAlumnosPorIdTutor() {
        $query = "SELECT relacion_alumno_tutor.id_relacion, relacion_alumno_tutor.matricula_alumno, alumno.nombre, alumno.ap_p,alumno.ap_m, relacion_alumno_tutor.aprobacion, alumno.materias_adeudadas, relacion_alumno_tutor.observacion
            FROM relacion_alumno_tutor, alumno
            WHERE relacion_alumno_tutor.matricula_alumno = alumno.matricula
            AND relacion_alumno_tutor.matricula_tutor = ?;";
        return $query;
    }

}

?>