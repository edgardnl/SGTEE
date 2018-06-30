<?php

class CoordinadorRelacionSql{
  function traeCoordinadoraRelacion() {
    /*
    $query ="SELECT
      relacion_alumno_tutor.id_relacion,
      alumno.matricula,
      alumno.nombre,
      alumno.ap_p,
      alumno.ap_m,
      relacion_alumno_tutor.estatus
    from(alumno inner join  relacion_alumno_tutor on alumno.id_alumno=relacion_alumno_tutor.id_alumno);
    ";*/
    $query= "select relacion_alumno_tutor.id_relacion,alumno.matricula,alumno.nombre, alumno.ap_p, alumno.ap_m,tutor.matricula as clave, tutor.nombre as ta, tutor.ap_p as tp, tutor.ap_m as tm, relacion_alumno_tutor.aprobacion as est
        from relacion_alumno_tutor, tutor, alumno
        where relacion_alumno_tutor.matricula_tutor = tutor.matricula
        and relacion_alumno_tutor.matricula_alumno = alumno.matricula;";

      return $query;
    } 

    function InsertarRelacionCoordinador() {
     $query = "INSERT INTO relacion_alumno_tutor(matricula_alumno,matricula_tutor,aprobacion,observacion) values(?,?,?,?);";
        return $query;
    }

    function consultaUltimaRelacion(){
      $query = "SELECT MAX(relacion_alumno_tutor.id_relacion) as id_relacion FROM relacion_alumno_tutor;";
      return $query;
    }
}
?>