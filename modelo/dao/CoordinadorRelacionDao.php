<?php

#require_once "../../../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CoordinadorRelacionObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/CoordinadorRelacionSql.php";

class CoordinadorRelacionDao {

    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function TraerCoordinadorRelacion() {

        $pP = CoordinadorRelacionSql::traeCoordinadoraRelacion();
        $query = $this->con->query($pP);
        $lista =[];
        $x =0;
        while($row = $query->fetch_array()) {
            $lista[] = new CoordinadorRelacionObjeto();
            $lista[$x]->id= $row['id_relacion'];
            $lista[$x]->clave=$row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m']; 
            $lista[$x]->estatus= $row['estatus'];          
            $x++;
        }
        return $lista;
    }

    function agregaCoordinador1($obj){
        $datosArray = array($obj->id_alumno,$obj->id_tutor,$obj->aprobacion,$obj->observacion,$obj->estatuss);
        $pP = procesaParametros::PrepareStatement(CoordinadorRelacionSql::InsertarRelacionCoordinador(),$datosArray);                   
        try {
            $this->con->query($pP);
            $res = "1";
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }

        return $res;
        
    }

}

?>