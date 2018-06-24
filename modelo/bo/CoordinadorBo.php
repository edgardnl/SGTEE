<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/CoordinadorDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/CoordinadorVista.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/UsuariosDaoAlumnos.php";

class ModuloCoordinador1 {

	private $vista;
	private $dao;
	private $daoUsu;
	
	function __construct(){
		$this->dao = new CoordinadorDao();
		$this->vista = new Coordinador1Vista();
		$this->daoUsu = new UsuariosDaoAlumnos();
	}
    /*
	function validarUsuario($id){
		$usu = $this->dao->buscarUsuarioIdPass($id);
		//$vis = $this->vista->loginDatos($usu);
		return $usu;
	}

	function traeAlumnosActividades(){
		$usu = $this->dao->traeAlumnosActividades();
		$vis = $this->vista->tablaAlumnosActividades($usu);
		return $vis;	
	}*/

	function ConsultarAlumnosCordinador1(){
    	$alumnos =$this->dao->TraerAlumnoCoordinador1();
    	$traervista =$this->vista->generaTablaAlumnosCoordinador($alumnos);
    	return $traervista;

    }
    /*
    function agregaAlumnos($obj,$obj1){
        try {
            $this->dao->agregaAlumnos($obj);
            $this->daoUsu->ingresaUsuarioAlumnos($obj1);
        }catch (Exception $ex) {
            $usu = $ex->getMessage();

        }
        return $usu;
    }
    */
    function traeCoordinadorPorId($id){
        $usu = $this->dao->traeCoordinadorPorId($id);
        return $usu;
    }
    
    function editaDatosCoordinador($obj){
        $usu = $this->dao->editaDatosCoordinador($obj);
        return $usu;
    }
    /*    
    function eliminaDatosAlumnos($obj){
        $usu = $this->dao->eliminaDatosAlumnos($obj);
        return $usu;
    }*/
    function eliminaDatosCoordinador($obj){
        $usu= $this->dao->eliminaDatosCoordinador($obj);
        return $usu;
    }

}

