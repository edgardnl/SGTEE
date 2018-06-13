<?php

class RelacionSql {
	
	function consultaRelacionesNombres(){
		$query = "SELECT id_relacion,tutor.nombre as nomtuto,tutor.ap_p as apatuto,tutor.ap_m as apmtuto,alumno.nombre as nomalu,alumno.ap_p as apaalu,alumno.ap_m as apmalu FROM relacion,tutor,alumno
			WHERE relacion.id_tutor = tutor.id_tutores
			and relacion.id_alumno = alumno.id_alumno;";
		return $query;
	}
}
?>