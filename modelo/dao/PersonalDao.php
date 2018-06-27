<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/PersonalObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/PersonalSql.php";

class PersonalDao {
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function buscaCoordinadorAcLogin($obj){
        $datosArray = array($obj->matricula,$obj->pass);
        $pP = procesaParametros::PrepareStatement(PersonalSql::buscaCoordinadorAcLogin(),$datosArray);        

        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $objA = new PersonalObjeto();        
        $objA->nRegistros = $query->num_rows;
        $objA->matricula = $row['matricula'];
        $objA->nombre = $row['nombre'];                                
        
        return $objA;   
    }
    
    function buscaCoordinadorEsLogin($obj){
        $datosArray = array($obj->matricula,$obj->pass);
        $pP = procesaParametros::PrepareStatement(PersonalSql::buscaCoordinadorEsLogin(),$datosArray);        

        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $objA = new PersonalObjeto();        
        $objA->nRegistros = $query->num_rows;
        $objA->matricula = $row['matricula'];
        $objA->nombre = $row['nombre'];                                
        
        return $objA;   
    }
    
    function buscaAdminLogin($obj){
        $datosArray = array($obj->matricula,$obj->pass);
        $pP = procesaParametros::PrepareStatement(PersonalSql::buscaAdminLogin(),$datosArray);        

        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $objA = new PersonalObjeto();        
        $objA->nRegistros = $query->num_rows;
        $objA->matricula = $row['matricula'];
        $objA->nombre = $row['nombre'];                                
        
        return $objA;   
    }
}
