<?php
//Esta es la segunda parte del formato donde se muestran las actividades

$con = mysqli_connect("localhost","root","","sgtee");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$idseg = 2;//$_POST['idseg'];
	$fecha = '2018-06-19';//$_POST['fecha'];
	$hora = '13:15:00';//$_POST['hora'];
	$lugar = 'Salon A10';//$_POST['lugar'];
	$problematica = 'si';//$_POST['problematica'];
	$avance = 'Programacion Logica';//$_POST['avance'];
	$id_motivo = 4;//$_POST['id_motivo'];

	//Ingresa las actividades los campos que se llenaran son (id_seguimiento,fecha,hora,lugar,detecto_problematica,avance,id_motivo)
	$query = "INSERT INTO actividades(id_seguimiento,fecha,hora,lugar,detecto_problematica,avance,id_motivo) VALUES ($idseg,'$fecha','$hora','$lugar','$problematica','$avance',$id_motivo);";
	echo $query;

	if (mysqli_query($con,$query)) {
		echo json_encode(["si"]);
	}else{
		echo json_encode(["no"]);
	}