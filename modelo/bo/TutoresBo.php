<?php

require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/TutoresDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/TutoresVista.php";

class ModuloTutores{
    
    private $vista;
    private $dao;
	
    function __construct(){
	$this->dao = new TutoresDao();
    $this->vista = new TutoresVista();
    }

    function consultaTutores(){
	$usu = $this->dao->traeTutores();
        $vis = $this->vista->generaTablaTutores($usu);
	return $vis;
    }
    
    function agregaTutor($obj){
        $usu = $this->dao->agregaTutor($obj);
        //return $usu;
    }
    
    function traeTutorPorClave($id){
        $usu = $this->dao->treaTutorPorClave($id);
        return $usu;
    }
    
    function traeTutoresPorId($id){
        $usu = $this->dao->treTutorPorId($id);
        return $usu;
    }
    
    function editaDatosTutor($obj){
        $usu = $this->dao->editaDatosTutor($obj);
        return $usu;
    }
    
    function eliminaDatosTutor($obj){
        $usu = $this->dao->eliminaDatosTutor($obj);
        return $usu;
    }
}

