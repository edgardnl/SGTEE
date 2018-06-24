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
            $lista[$x]->estatus = $row['estatus'];          
            $x++;
        }
        return $lista;
    }     
    function traeCoordinadorPorId($id){
        $datosArray = array($id->id);
        $pP = procesaParametros::PrepareStatement(CoordinadorSql::traeCoordinadorPorId(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new AlumnosObjetoCoordinador1();
        $obj->id_relacion=$row['id_relacion'];
        $obj->id_alumno=$row['id_alumno'];
        $obj->id_tutor = $row['id_tutor'];
        $obj->aprobacion= $row['aprobacion'];
        $obj->observacion = $row['observacion'];
        $obj->estatuss = $row['estatus'];
        
        return $obj;
    }
    /*
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
    */
    function editaDatosCoordinador($obj){
        //$datosArray = array($obj->id,$obj->clave,$obj->nombre,$obj->ap_p,$obj->ap_m,$obj->asignatura,$obj->horaio);
        $pP = CoordinadorSql::editaDatosCoordinador($obj);                
        
        try {
            $this->con->query($pP);
            $res = "1";
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }

        return $pP;
    }
    
    function eliminaDatosCoordinador($obj){
        $datosArray = array($obj->id_relacion);
        $pP = procesaParametros::PrepareStatement(CoordinadorSql::eliminaDatosCoordinador(),$datosArray);
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            $res= $exc->getTraceAsString();
        }
           return $res;     
        
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