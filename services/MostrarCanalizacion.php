<?php

$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$idact = $_POST['idact'];

	//Trae los datos de la canalizacion por el id_actividad, los campos son (id_canalizacion,id_actividad,id_area,encaragado,observacion)
	$query = "SELECT * FROM canalizacion where id_actividades = $idact";

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