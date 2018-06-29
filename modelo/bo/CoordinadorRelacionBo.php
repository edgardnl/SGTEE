<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/CoordinadorRelacionDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/CoordinadorRelacionVista.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/UsuariosDaoAlumnos.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/AlumnosDao.php";

class ModuloRelacion_Alumno_Tutor {

    private $vista;
    private $dao;
    private $daoAlu;

    function __construct() {
        $this->dao = new CoordinadorRelacionDao();
        $this->vista = new CoordinadorRelacionVista();
        $this->daoAlu = new AlumnosDao();
    }

    function ConsultarCoordinadorRelacion() {
        $alumnos = $this->dao->TraerCoordinadorRelacion();
        $traervista = $this->vista->generaTablaCoordinadorRelacion($alumnos);
        return $traervista;
    }

    function agregaCoordinador1($obj) {
        $usu = 0;
        try {
            $this->dao->agregaCoordinador1($obj);
            $this->daoAlu->actualizaStatusAlumno($obj);
            $usu = 1;
        } catch (Exception $ex) {
            $usu = 2;//$ex->getMessage();
        }
        return $usu;
    }

}
