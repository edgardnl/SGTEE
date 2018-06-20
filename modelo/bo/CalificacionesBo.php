<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CalificacionesDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/CalificacionesVista.php";

class ModuloCalificaciones{
	
	private $vista;
    private $dao;

    function __construct() {
        $this->dao = new CalificacacionesDao();
        $this->vista = new CalificacionesVista();        
    }

    function traeCalificacionesPorIdAlumno($obj){
    	$cal = $this->dao->traeCalificacionesPorIdAlumno($obj);
    }
}