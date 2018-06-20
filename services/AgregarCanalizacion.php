<?php
//Agrega las canalizaciones con el id de la actividad
$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$idact = $_POST['idact'];
	$idarea = $_POST['idarea'];
	$encargado = $_POST['encargado'];
	$observacion = $_POST['observacion'];
	
	//Ingresa las actividades los campos que se llenaran son (id_actividades,id_area,encargado,observacion)
	$query = "insert into canalizacion(id_actividades,id_area,encargado,observacion)value($idact,$idarea,'$encargado','$observacion')";
	//echo $query;

	if (mysqli_query($con,$query)) {
		echo json_encode(["si"]);
	}else{
		echo json_encode(["no"]);
	}