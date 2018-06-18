<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/AlumnosDao.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/vista/php/AlumnoVista.php";

require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/UsuariosDao.php";

class ModuloUsuarios {

    private $vista;
    private $dao;
    private $daoU;

    function __construct() {
        $this->dao = new AlumnosDao();
        $this->vista = new AlumnoVista();
        $this->daoU = new UsuariosDao();
    }

    function validarUsuario($id) {
        $usu = $this->dao->buscarUsuarioIdPass($id);
        //$vis = $this->vista->loginDatos($usu);
        return $usu;
    }

    function traeUsuarioPorClave($obj) {
        $usu = $this->daoU->traeUsuarioPorClave($obj);
        return $usu;
    }

}
