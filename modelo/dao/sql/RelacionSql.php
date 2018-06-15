<?php

class RelacionSql {

    function consultaRelacionesNombres() {
        $query = "SELECT id_relacion,tutor.nombre as nomtuto,tutor.ap_p as apatuto,tutor.ap_m as apmtuto,alumno.nombre as nomalu,alumno.ap_p as apaalu,alumno.ap_m as apmalu FROM relacion,tutor,alumno
			WHERE relacion.id_tutor = tutor.id_tutores
			and relacion.id_alumno = alumno.id_alumno;";
        return $query;
    }

    function consultaAlumnosPorIdTutor() {
        $query = "select id_relacion, relacion_alumno_tutor.id_alumno,alumno.nombre,alumno.ap_p,alumno.ap_m,aprobacion ,observacion 
            from relacion_alumno_tutor,alumno
            where relacion_alumno_tutor.id_alumno = alumno.id_alumno
            and relacion_alumno_tutor.id_tutor = ? ;";
        return $query;
    }

}

?>