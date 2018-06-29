<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CatalogosDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/CatalogosVista.php";

class ModuloCatalogos{
	
	private $vista;
    private $dao;    

    function __construct() {
        $this->dao = new CatalogosDao();
        $this->vista = new CatalogosVista();        
    }

    function traeSelectParcial(){
    	$dat = $this->dao->traeParcial();
    	$sel = $this->vista->generaSelectParcial($dat);
    	return $sel;
    }

    function traeSelectAsignatura(){
    	$dat = $this->dao->traeAsignaturas();
    	$sel = $this->vista->generaSelectAsignatura($dat);
    	return $sel;
    }

    function traeSelectProfesores(){
    	$dat = $this->dao->traeProfesores();
    	$sel = $this->vista->generaSelectProfesores($dat);
    	return $sel;
    }
}