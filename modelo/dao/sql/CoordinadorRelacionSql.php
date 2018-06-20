<?php

class CoordinadorRelacionSql{
  function traeCoordinadoraRelacion() {
    $query ="SELECT
      relacion_alumno_tutor.id_relacion,
      alumno.matricula,
      alumno.nombre,
      alumno.ap_p,
      alumno.ap_m,
      relacion_alumno_tutor.estatus
    from(alumno inner join  relacion_alumno_tutor on alumno.id_alumno=relacion_alumno_tutor.id_alumno);
    ";
      return $query;
    } 
}
?>