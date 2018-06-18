<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/SeguimientoTutorDao.php";

class ModuloCanalizacion {
    //private $vista;
    private $dao;

    function __construct() {
        $this->dao = new CanalizacionDao();
        //$this->vista = new CanalizacionVista();        
    }
    
    function traeCanalizacionPorIdActividad($obj){
        return $this->dao->traeCanalizacionPorIdActividad($obj);
    }
}
