<?php

class ActividadesSql {

    function traeActividadesporAlumno() {
        $query = "SELECT id_actividades, tutor.nombre as tutor, alumno.nombre as alumno, fecha, hora, lugar, detecto_problematica, avance, motivo.descripcion as motivo 
            FROM actividades,seguimiento_tutor,relacion_alumno_tutor,tutor,alumno,motivo
            where actividades.id_seguimiento = seguimiento_tutor.id_seguimiento
            and actividades.id_motivo = motivo.id_motivo
            and seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
            and relacion_alumno_tutor.id_tutor = tutor.id_tutores
            and relacion_alumno_tutor.id_alumno = alumno.id_alumno
            and alumno.id_alumno = ?";
        return $query;
    }

}
