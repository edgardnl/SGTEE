<?php

class CoordinadorSql {

    function consultaUsuarioPass() {
        $query = "SELECT * FROM usuario WHERE matricula  = ? and contrasena = ?;";
        return $query;
    }

    function cosultaAlumnos() {
        $query = "SELECT * FROM alumno ;";
        return $query;
    }

    function traeAlumnosCoordinador() {
        $query = "SELECT * FROM alumno";
        return $query;
    }

    function traeCoordinadorPorId() {
        $query = "SELECT * FROM sgtee.relacion_alumno_tutor,sgtee.alumno
            where relacion_alumno_tutor.matricula_alumno = alumno.matricula
            and alumno.matricula = ?;";
        return $query;
    }

    function editaDatosCoordinador() {
        $query = "update relacion_alumno_tutor 
            set relacion_alumno_tutor.matricula_tutor = ?, relacion_alumno_tutor.aprobacion = ?, relacion_alumno_tutor.observacion = ?
            where relacion_alumno_tutor.id_relacion = ?";
        return $query;
    }

    function eliminaDatosCoordinador() {
        $query = "DELETE FROM relacion_alumno_tutor where id_relacion = ?;";
        return $query;
    }

}

?>