<?php
	$con = mysqli_connect("localhost","root","","sgte");
	if ($con->connect_errno) {
		die("Fallo la conexion");
	}else{
		//echo "Conexion existosa \n";
	}

	$clave = $_POST['clave'];

	//Es de la tabla personal donde estan todos los mando coordinadora, jefe de carrera
	$query = "SELECT * FROM personal WHERE clave = '$clave' and cargo = 'Coordinadora';";
	//Es de la tabla usuario pero aqui no estan los datos personales
	//$query = "SELECT * FROM usuario WHERE usuario.matricula = '$clave' AND usuario.id_role = 4;";
	
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