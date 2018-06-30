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
        $usu = 0;
        $n = $this->dao->buscarTutorClave($obj);
        if ($n->nclave > 0) {
            $usu = 1;            
        }else{
            try {
                $this->dao->agregaTutor($obj);
                $this->daoUsu->ingresaUsuarioTutor($obj1);
                $usu = 2;
            } catch (Exception $ex) {
                $usu = 3;//$ex->getMessage();
            }
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
        $usu = 0;
                    
        try {
            $this->dao->editaDatosTutor($obj);
            $usu = 2;
        } catch (Exception $ex) {
            $usu = 3;//$ex->getMessage();
        }
                                        
        return $usu;                
    }
    
    function eliminaDatosTutor($obj){
        $usu = 0;
        try {
           //$tuto = $this->dao->treTutorPorId($obj);
           $this->daoUsu->eliminaUsurioTutor($obj);
           $this->dao->eliminaDatosTutor($obj);
           $usu = 2;
        } catch (Exception $ex) {
            $usu = 3;//$ex->getMessage();
        }
        
        return $usu;
    }

    function consultaTutoresNombres(){
        $usu = $this->dao->traeTutorNombre();
        $vis = $this->vista->generaSelectTutores($usu);
        return $vis;
    }

    function buscaTutorLogin($obj){
        return $this->dao->buscarTutorLogin($obj);
    }

    function cambiaPass($obj){
        $usu = 0;                    
        try {
            $this->dao->cambiaPassTu($obj);
            $usu = 1;
        } catch (Exception $ex) {
            $usu = 2;//$ex->getMessage();
        }
                                        
        return $usu;                
    }


}

