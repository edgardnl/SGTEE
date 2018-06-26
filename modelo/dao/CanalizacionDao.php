<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CanalizacionObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/CanalizacionSql.php";

class CanalizacionDao {
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function traeCanalizacionPorIdActividad($obj){
        $datosArray = array($obj->id_actividades);
        $pP = procesaParametros::PrepareStatement(CanalizacionSql::traeCanalizacionPorIdActividad(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $objC = new CanalizacionObjeto();
        $objC->id_actividades = $row['id_actividades'];
        $objC->id_area = $row['area'];
        $objC->encargado = $row['encargado'];        
        $objC->observacion = $row['observacion'];        
        return $objC;
    }
    
    function guardaActividad($obj){
        $datosArray = array($obj->id_actividades,$obj->id_area,$obj->encargado,$obj->observacion);
        $pP = procesaParametros::PrepareStatement(CanalizacionSql::guardaCanalizacion(),$datosArray); 

        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
        
    }

    function existeCanalizacion($obj){
        $datosArray = array($obj->id_actividades);
        $pP = procesaParametros::PrepareStatement(CanalizacionSql::existeCanalizacion(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $objC = new CanalizacionObjeto();
        $objC->nActividades = $row['nActividades'];        
        return $objC;   
    }

    function eliminarCanalizacion($obj){
        $datosArray = array($obj->id_actividades);
        $pP = procesaParametros::PrepareStatement(CanalizacionSql::eliminaCanalizacion(),$datosArray); 

        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
}
