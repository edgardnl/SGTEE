<?php
//Esta es la segunda parte del formato donde se muestran las actividades

$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$idseg = 2;//$_POST['idtu'];

	//Trae los datos de las actividades del alumno la cuales se buecan con el id_segumiento, sus campos son (id_actividades,fecha,hora,lugar,detecto_problematica,avance,descripcion,id_motivo)
	$query = "SELECT actividades.id_actividades,actividades.fecha,actividades.hora,actividades.lugar,actividades.detecto_problematica,actividades.avance,motivo.descripcion,actividades.id_motivo 
            FROM actividades,motivo 
            WHERE actividades.id_motivo = motivo.id_motivo
            AND actividades.id_seguimiento = $idseg";

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