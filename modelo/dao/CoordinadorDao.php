<?php

#require_once "../../../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjetoAlumnos.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/CoordinadorSql.php";

class CoordinadorDao{

    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }        

    function TraerAlumnoCoordinador1() {
        $pP = CoordinadorSql::traeAlumnosCoordinador();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new AlumnosObjetoCoordinador1();
            $lista[$x]->id = $row['id_alumno'];
            $lista[$x]->clave = $row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m'];            
            $x++;
        }
        return $lista;
    }     

    function traeAlumnosPorId($id){
        $datosArray = array($id->id);
        $pP = procesaParametros::PrepareStatement(AlumnosSql::traeAlumnosPorIdAlumnos(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new AlumnosObjeto();
        $obj->id = $row['id_alumno'];
        $obj->matricula = $row['matricula'];
        $obj->nombre = $row['nombre'];
        $obj->ap_p = $row['ap_p'];
        $obj->ap_m = $row['ap_m'];
        $obj->grupo = $row['grupo'];
        $obj->carrera = $row['carrera'];
        $obj->telefono = $row['telefono'];
        $obj->telefono_cel= $row['telefono_cel'];
        $obj->semestre = $row['semestre'];
        $obj->correo = $row['correo'];
        $obj->sexo = $row['sexo'];
        $obj->nombreAll = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];
        
        return $obj;
    }
    
    function editaDatosAlumnos($obj){
        //$datosArray = array($obj->id,$obj->clave,$obj->nombre,$obj->ap_p,$obj->ap_m,$obj->asignatura,$obj->horaio);
        $pP = AlumnosSql::editaDatosAlumnoss($obj);                
        
        try {
            $this->con->query($pP);
            $res = "1";
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }

        return $pP;
    }
    
    /*function eliminaDatosAlumnos($obj){
        $datosArray = array($obj->id);
        $pP = procesaParametros::PrepareStatement(AlumnosSql::eliminaDatosAlumnos(),$datosArray);
        $res ="";
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }
        
        return $res;
        
    }*/





}

?>