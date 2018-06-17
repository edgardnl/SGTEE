<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/ActividadesDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/ActividadesVista.php";

class ModuloActividades {

    private $vista;
    private $dao;

    function __construct() {
        $this->dao = new ActividadesDao();
        $this->vista = new ActividadesVista();
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

}
