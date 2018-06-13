<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/AlumnosDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/AlumnoVista.php";

class ModuloUsuarios {

	private $vista;
	private $dao;
	
	function __construct(){
		$this->dao = new AlumnosDao();
		$this->vista = new AlumnoVista();
	}

	function validarUsuario($id){
		$usu = $this->dao->buscarUsuarioIdPass($id);
		//$vis = $this->vista->loginDatos($usu);
		return $usu;
	}

}
?>