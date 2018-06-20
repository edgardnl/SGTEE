<?php
//Encabezado del formato de seguimiento tutorial

$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$idseg = 2;//$_POST['idtu'];

	//Trea los todos los datos del alumno y solo el nombre del tutor, los campos son (id_seguimiento,programa,nombre,ap_p,ap_m,matricula,nombrea,ap_pa,ap_ma,semestre,carrera,grupo,correo,telefono.telefono_cel)
	$query = "SELECT seguimiento_tutor.id_seguimiento,seguimiento_tutor.programa, tutor.nombre, tutor.ap_p,tutor.ap_m,alumno.matricula,alumno.nombre as nombrea,alumno.ap_p as ap_pa,alumno.ap_m as ap_ma,alumno.semestre,alumno.carrera,alumno.grupo,alumno.correo,alumno.telefono,alumno.telefono_cel 
			FROM seguimiento_tutor,relacion_alumno_tutor,tutor,alumno
			WHERE seguimiento_tutor.id_relacion = relacion_alumno_tutor.id_relacion
			AND relacion_alumno_tutor.id_tutor = tutor.id_tutores
			AND relacion_alumno_tutor.id_alumno = alumno.id_alumno
			AND seguimiento_tutor.id_seguimiento = $idseg";

	$result = mysqli_query($con,$query);

	if (mysqli_num_rows($result) >0) {
		$datos = [];
		$x = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$datos[] = array();
			$datos[$x] = array_map("utf8_encode",$row);
			$x++;
		}
		$json_array = json_encode($datos);
		echo $json_array;
	}else{
		echo json_encode(["no"]);
	}