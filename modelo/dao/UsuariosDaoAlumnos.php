<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjetoAlumnos.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/UsuariosSqlAlumnos.php";

class UsuariosDaoAlumnos {
    
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function ingresaUsuarioAlumnos($obj){
        $datosArray = array($obj->matricula_usuario,$obj->contrasena,$obj->id_role);
        $pP = procesaParametros::PrepareStatement(UsuariosSqlAlumnos::ingresaUsuarioAlumnos(),$datosArray);                        
        
        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
    
    function eliminaUsurioTutor($obj){
        $datosArray = array($obj->clave);
        $pP = procesaParametros::PrepareStatement(UsuariosSql::eliminaUsuarioTutor(),$datosArray);        
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            print $exc->getTraceAsString();
        }
    }
}
