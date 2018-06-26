<?php
class conexion{
	private static $host = "localhost";
	private static $user = "root";
	private static $pwd = "Orion_4528";
	private static $db = "sgte";

	public static function conectar(){
		return mysqli_connect(conexion::$host,conexion::$user,conexion::$pwd,conexion::$db);
		//sgte edgar
	}

}


?>