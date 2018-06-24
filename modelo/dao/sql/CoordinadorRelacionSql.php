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
    $query="SELECT 
      relacion_alumno_tutor.id_relacion,
      alumno.matricula,
      alumno.nombre,
      alumno.ap_p,
      alumno.ap_m,
      tutor.clave,
      tutor.nombre as ta,
      tutor.ap_p as tp,
      tutor.ap_m as tm,
      relacion_alumno_tutor.estatus as est
     from((alumno inner join  relacion_alumno_tutor on alumno.id_alumno=relacion_alumno_tutor.id_alumno)
     inner join tutor on tutor.id_tutores=relacion_alumno_tutor.id_tutor);";


      return $query;
    } 

    function InsertarRelacionCoordinador() {
     $query = "INSERT INTO relacion_alumno_tutor(id_alumno,id_tutor,aprobacion,observacion,estatus) values(?,?,?,?,?);";
        return $query;
    }
}
?>