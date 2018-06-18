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

    function traeTotalActividadesPorSeguimiento(){
        $query = "SELECT COUNT(actividades.id_actividades) as n_actividades
            FROM actividades,seguimiento_tutor
            WHERE actividades.id_seguimiento = seguimiento_tutor.id_seguimiento
            AND seguimiento_tutor.id_seguimiento = ?";
        return $query;   
    }

    function traeActividadesPorIdSeguimiento(){
        $query = "SELECT actividades.id_actividades,actividades.fecha,actividades.hora,actividades.lugar,actividades.detecto_problematica,actividades.avance,motivo.descripcion,actividades.id_motivo 
            FROM sgte.actividades,sgte.motivo 
            WHERE actividades.id_motivo = motivo.id_motivo
            AND actividades.id_seguimiento = ?";
        return $query;      
    }

    function guardaActividades(){
        $query = "INSERT INTO actividades(id_seguimiento,fecha,hora,lugar,detecto_problematica,avance,id_motivo) VALUES (?,?,?,?,?,?,?);";
        return $query;         
    }
    
    function traeUltimaActividadPorIdSeguimiento(){
        $query = "select max(id_actividades) as id_actividades from sgte.actividades where id_seguimiento = ?;";
        return $query;   
    }

}
