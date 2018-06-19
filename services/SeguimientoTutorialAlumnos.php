<?php	

	$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$tutor = 1;//$_POST['tutor'];

	//La consulta trae a is alumnos que tiene el tutor asignado en tutorias especiales los campos son (id_seguimineto,id_alumno,nombre,ap_p,ap_m)	

    $query = "SELECT seguimiento_tutor.id_seguimiento,relacion_alumno_tutor.id_alumno,alumno.nombre,alumno.ap_p,alumno.ap_m 
			FROM seguimiento_tutor,relacion_alumno_tutor,alumno,tutor
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.id_alumno = alumno.id_alumno
			AND relacion_alumno_tutor.id_tutor = tutor.id_tutores
			AND tutor.id_tutores = $tutor";

	//Esta consulta trae el numero de actividades por alumno lo cual las busca atravez del id_seguimiento de la tabla seguimineto tutorias
	/*$query1 = "SELECT COUNT(actividades.id_actividades) as n_actividades
            FROM actividades,seguimiento_tutor
            WHERE actividades.id_seguimiento = seguimiento_tutor.id_seguimiento
            AND seguimiento_tutor.id_seguimiento = $id_seguimiento";*/
	
	
	$result = mysqli_query($con,$query);

	if (mysqli_num_rows($result) >0) {
		$datos = array();

		$datos[] = array_map("utf8_encode", mysqli_fetch_assoc($result));
		$json_array = json_encode($datos);
		echo $json_array;
	}else{
		echo json_encode(["no"]);
	}
?>