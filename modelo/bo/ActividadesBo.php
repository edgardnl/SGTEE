<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/ActividadesDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/ActividadesVista.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CanalizacionDao.php";

class ModuloActividades {

    private $vista;
    private $dao;
    private $daoCa;

    function __construct() {
        $this->dao = new ActividadesDao();
        $this->vista = new ActividadesVista();
        $this->daoCa = new CanalizacionDao();
    }
    
    function traeActividadesPorAlumno($obj){
        $act = $this->dao->traeActividadesPorAlumno($obj);
        $tabla = $this->vista->tablaAlumnosActividades($act);
        return $tabla;
    }

    function traeActividadesPorIdSeguimiento($obj){
        $act = $this->dao->traeActividadesPorIdSeguimiento($obj);
        $vis = $this->vista->tablaActividadPorIdSeguimiento($act);
        return $vis;
    }

    function guardaActividadCa($obj,$objc){
        $usu = "";
        try {
            $this->dao->guardaActividad($obj);
            $obja = $this->dao->traeUltimaActividadPorIdSeguimiento($obj);
            $objc->id_actividades = $obja->id_actividades;
            $this->daoCa->guardaActividad($objc);
        } catch (Exception $ex) {
            $usu = $ex->getMessage();
        }
        
        return $usu;

    }
    
    function guardaActividad($obj){
        $usu = "";
        try {
            $this->dao->guardaActividad($obj);            
        } catch (Exception $ex) {
            $usu = $ex->getMessage();
        }
        
        return $usu;

    }

}
