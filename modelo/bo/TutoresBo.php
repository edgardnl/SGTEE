<?php

require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/TutoresDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/TutoresVista.php";

require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/UsuariosDao.php";

class ModuloTutores{
    
    private $vista;
    private $dao;
    private $daoUsu;
            
    function __construct(){
	$this->dao = new TutoresDao();
        $this->vista = new TutoresVista();
        $this->daoUsu = new UsuariosDao();
    }

    function consultaTutores(){
	$usu = $this->dao->traeTutores();
        $vis = $this->vista->generaTablaTutores($usu);
	return $vis;
    }
    
    function agregaTutor($obj,$obj1){
        $usu ="";
        try {
            $this->dao->agregaTutor($obj);
            $this->daoUsu->ingresaUsuarioTutor($obj1);
        } catch (Exception $ex) {
            $usu = $ex->getMessage();
        }
        
        return $usu;
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
        $usu = "";
        try {
            $this->dao->editaDatosTutor($obj);
        } catch (Exception $ex) {
            $usu = $ex->getMessage();
        }
        return $usu;
    }
    
    function eliminaDatosTutor($obj){
        try {
           $tuto = $this->dao->treTutorPorId($obj);
           $this->daoUsu->eliminaUsurioTutor($tuto);
           $this->dao->eliminaDatosTutor($obj);
        } catch (Exception $ex) {
            $usu = $ex->getMessage();
        }
        
        return $usu;
    }
    function consultaTutoresNombres(){
    $usu = $this->dao->traeTutorNombre();
        $vis = $this->vista->generaSelectTutores($usu);
    return $vis;
    }


}

