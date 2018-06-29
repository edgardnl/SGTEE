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
            $lista[$x]->clavet=$row['clave'];
            $lista[$x]->nombret = $row['ta'];
            $lista[$x]->ap_pt = $row['tp'];
            $lista[$x]->ap_mt = $row['tm']; 
            $lista[$x]->estatus= $row['est'];          
            $x++;
        }
        return $lista;
    }

    function agregaCoordinador1($obj){
        $datosArray = array($obj->matricula_alumno,$obj->matricula_tutor,$obj->aprobacion,$obj->observacion);
        $pP = procesaParametros::PrepareStatement(CoordinadorRelacionSql::InsertarRelacionCoordinador(),$datosArray);                   
        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            $exc->getMessage();
        }        
        
    }

}

?>