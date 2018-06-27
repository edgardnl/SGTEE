<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/PersonalDao.php";

class ModuloPersonal {
    
    private $vista;
    private $dao;
    

    function __construct(){
            $this->dao = new PersonalDao();            
    }
    
    function buscarAdminLogin($obj){
        return $this->dao->buscaAdminLogin($obj);
    }
    
    function buscarCoordinadorAcLogin($obj){
        return $this->dao->buscaCoordinadorAcLogin($obj);
    }
    
    function buscarCoordinadorEsLogin($obj){
        return $this->dao->buscaCoordinadorEsLogin($obj);
    }
}
