<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/CoordinadorRelacionDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/CoordinadorRelacionVista.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/UsuariosDaoAlumnos.php";

class ModuloRelacion_Alumno_Tutor{

	private $vista;
	private $dao;
	private $daoUsu;
	
	function __construct(){
		$this->dao = new CoordinadorRelacionDao();
		$this->vista = new CoordinadorRelacionVista();
		
	}

	function ConsultarCoordinadorRelacion(){
    	$alumnos =$this->dao->TraerCoordinadorRelacion();
    	$traervista =$this->vista->generaTablaCoordinadorRelacion($alumnos);
    	return $traervista;

    } 

}

