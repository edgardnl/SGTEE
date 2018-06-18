<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/SeguimientoTutorDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/SeguimientoTutorVista.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/SeguimientoTutorObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/ActividadesDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

class ModuloSeguimientoTutor {

    private $vista;
    private $dao;
    private $daoAct;

    function __construct() {
        $this->dao = new SeguimientoTutorDao();
        $this->vista = new SeguimientoTutorVista();
        $this->daoAct = new ActividadesDao();
    }

    function traeSeguimientoActividades($obj) {
        $seg = $this->dao->traeSeguimientoAlumnosPorTutor($obj);

        foreach ($seg as $ro) {
            $nact = $this->daoAct->traeTotalActividadesPorSegumiento($ro);
            $ro->numActividades = $nact->nTotal;
        }

        $tabla = $this->vista->generaTablaSeguimientoTutorActividades($seg);
        return $tabla;
    }

    function traeSegumientoDatosAlumnoTutor($obj) {
        return $this->dao->traSeguimientoDatosTutorAlumno($obj);
    }

}
