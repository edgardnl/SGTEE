<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CalificacionesDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/CalificacionesVista.php";

class ModuloCalificaciones{
	
	private $vista;
    private $dao;

    function __construct() {
        $this->dao = new CalificacionesDao();
        $this->vista = new CalificacionesVista();        
    }

    function traeCalificacionesPorIdAlumno($obj){
    	$cal = $this->dao->traeCalificacionesPorIdAlumno($obj);
        $datos = $this->vista->tablaCalificacionesPorId($cal);
        return $datos;
    }

    function agregaCalificaciones($obj){
        $usu = 0;
        try {
            $this->dao->guardaCalificaciones($obj);
            $usu = 1;
        } catch (Exception $e) {
            $usu = 2;
        }

        return $usu;
    }
    
    function consultaCalificacionesPorId($obj){
        return $this->dao->traeCalificacionesPorId($obj);
    }
    
    function editaCalificacionesPorId($obj){
        $usu = 0;
        try {
            $this->dao->editaCalificaciones($obj);
            $usu = 1;
        } catch (Exception $e) {
            $usu = 2;
        }

        return $usu;
    }
    
    function eliminaCalificacionesPorId($obj){
        $usu = 0;
        try {
            $this->dao->eliminaCalificaciones($obj);
            $usu = 1;
        } catch (Exception $e) {
            $usu = 2;
        }

        return $usu;
    }

    function traeCalificacionesAlumnosPorIdAlumno($obj){
        $cal = $this->dao->traeCalificacionesPorIdAlumno($obj);
        $datos = $this->vista->tablaCalificacionesAluPorId($cal);
        return $datos;
    }
}