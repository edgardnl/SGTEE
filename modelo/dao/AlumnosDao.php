<?php

#require_once "../../../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/UsuariosObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/sql/AlumnosSql.php";

class AlumnosDao {
	
	private $con;
        
	function __construct(){
		$this->con = conexion::conectar();
	}

	function __destruct(){
		$this->con->close();
	}

	function buscarUsuarioIdPass($datos){
		$usuarioArray = array($datos->usuario,$datos->contrasena);
		$pP = procesaParametros::PrepareStatement(AlumnosSql::consultaUsuarioPass(),$usuarioArray);
		$query = $this->con->query($pP);
		$row = $query->fetch_array();
		$usu = new UsuariosObjeto();
		$usu->usuario = $row['usuario'];
		$usu->contrasena = $row['contrasena'];
        $usu->id_role = $row['id_role'];
                
		return $usu;
	}

	function traeAlumnosActividades(){
		$pP = AlumnosSql::cosultaAlumnos();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new TutoresObjeto();
            $lista[$x]->id = $row['id_alumno'];
            $lista[$x]->matricula = $row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m'];            
            $x++;
        }
        return $lista;
	}
        
}

?>