<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CoordinadorDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/CoordinadorVista.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/UsuariosDaoAlumnos.php";

class ModuloCoordinador1 {

    private $vista;
    private $dao;

    function __construct() {
        $this->dao = new CoordinadorDao();
        $this->vista = new Coordinador1Vista();        
    }

    function ConsultarAlumnosCordinador1() {
        $alumnos = $this->dao->TraerAlumnoCoordinador1();
        $traervista = $this->vista->generaTablaAlumnosCoordinador($alumnos);
        return $traervista;
    }

    function traeCoordinadorPorId($id) {
        $usu = $this->dao->traeCoordinadorPorId($id);
        return $usu;
    }

    function editaDatosCoordinador($obj) {
        $usu = 0;
        try {
            $this->dao->editaDatosCoordinador($obj);
            $usu = 1;
        } catch (Exception $ex) {
            $usu = 2;
        }

        return $usu;
    }

    function eliminaDatosCoordinador($obj) {
        $usu = $this->dao->eliminaDatosCoordinador($obj);
        return $usu;
    }

}
