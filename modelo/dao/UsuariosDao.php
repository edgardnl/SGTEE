<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/UsuariosSql.php";

class UsuariosDao {
    
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function ingresaUsuarioTutor($obj){
        $datosArray = array($obj->alumnoID,$obj->tutorID,$obj->coordinadorID,$obj->administradorID);
        $pP = procesaParametros::PrepareStatement(UsuariosSql::ingresaUsuraioTutor(),$datosArray);                        
        
        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
    
    function eliminaUsurioTutor($obj){
        $datosArray = array($obj->matricula);
        $pP = procesaParametros::PrepareStatement(UsuariosSql::eliminaUsuarioTutor(),$datosArray);        
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            print $exc->getTraceAsString();
        }
    }
    
    function traeUsuarioPorClave($obj){
        $datosArray = array($obj->matricula);
        $pP = procesaParametros::PrepareStatement(UsuariosSql::traeUsuarioPorClave(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new UsuariosObjeto();
        $obj->id_usuario = $row['id_usuario'];                
        $obj->matricula = $row['matricula'];
        $obj->contrasena = $row['contrasena'];        
        
        return $obj;
    }
}
