<?php

require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/AlumnosDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/AlumnoVista.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/UsuariosDaoAlumnos.php";

class ModuloAlumnos {

	private $vista;
	private $dao;
	private $daoUsu;
	
	function __construct(){
		$this->dao = new AlumnosDao();
		$this->vista = new AlumnoVista();
		$this->daoUsu = new UsuariosDaoAlumnos();
	}

	function validarUsuario($id){
		$usu = $this->dao->buscarUsuarioIdPass($id);
		//$vis = $this->vista->loginDatos($usu);
		return $usu;
	}

	function traeAlumnosActividades(){
		$usu = $this->dao->traeAlumnosActividades();
		$vis = $this->vista->tablaAlumnosActividades($usu);
		return $vis;	
	}

	function ConsultarAlumnos(){
    	$alumnos =$this->dao->TraerAlumno();
    	$traervista =$this->vista->generaTablaAlumnos($alumnos);
    	return $traervista;

    }

    function agregaAlumnos($obj,$obj1){
        $usu = 0;
        $ma = $this->dao->consultaMatricula($obj);
        if ($ma->nMatricula > 0) {
            $usu = 1;
        }else{
            try {
                $this->dao->agregaAlumnos($obj);
                $this->daoUsu->ingresaUsuarioAlumnos($obj1);
                $usu = 2;
            }catch (Exception $ex) {
                $usu = 3;//$ex->getMessage();

            }    
        }
        
        return $usu;
    }

    function traeAlumnosPorId($id){
        $usu = $this->dao->traeAlumnosPorId($id);
        return $usu;

    }
    
    function editaDatosAlumnos($obj){                
        $usu = 0;                    
        try {
            $this->dao->editaDatosAlumnos($obj);
            $usu = 2;
        } catch (Exception $ex) {
            $usu = 3;//$ex->getMessage();
        }
                                        
        return $usu;                
    }
    
    function eliminaDatosAlumnos($obj){
        $usu = 0;
        try {
           $tuto = $this->dao->traeAlumnosPorId($obj);
           $this->dao->eliminaDatosAlumnos($obj);
           $this->daoUsu->eliminaUsurioAlumno($tuto);
           $usu = 2;
        } catch (Exception $ex) {
            $usu = 3;//$ex->getMessage();
        }
        return $usu;
    }
    
    function buscaAlumnoLogin($obj){
        return $this->dao->buscaAlumnoLogin($obj);
    }

}

