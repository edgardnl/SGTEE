<?php

#require_once "../../../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/AlumnosSql.php";

class AlumnosDao {

    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function buscarUsuarioIdPass($datos) {
        $usuarioArray = array($datos->matricula, $datos->contrasena);
        $pP = procesaParametros::PrepareStatement(AlumnosSql::consultaUsuarioPass(), $usuarioArray);
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        $usu = new UsuariosObjeto();
        $usu->matricula = $row['matricula'];
        $usu->contrasena = $row['contrasena'];
        $usu->id_role = $row['id_role'];

        return $usu;
    }

    function traeAlumnosActividades() {
        $pP = AlumnosSql::cosultaAlumnos();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new TutoresObjeto();
            $lista[$x]->id = $row['id_alumno'];
            $lista[$x]->matricula = $row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m'];
            $x++;
        }
        return $lista;
    }

    function TraerAlumno() {
        $pP = AlumnosSql::traeAlumnos();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new AlumnosObjeto();
            $lista[$x]->id = $row['id_alumno'];
            $lista[$x]->clave = $row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m'];            
            $x++;
        }
        return $lista;
    }
     function agregaAlumnos($obj){
        $datosArray = array($obj->matricula,$obj->nombre,$obj->ap_p,$obj->ap_m,$obj->grupo,$obj->carrera,$obj->telefono,$obj->telefono_cel,$obj->semestre,$obj->correo,$obj->sexo);
        $pP = procesaParametros::PrepareStatement(AlumnosSql::agregaAlumnossql(),$datosArray);                
        
        try {
            $this->con->query($pP);
            $res = "1";
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }

        return $res;
        
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
    
    function eliminaDatosAlumnos($obj){
        $datosArray = array($obj->id);
        $pP = procesaParametros::PrepareStatement(AlumnosSql::eliminaDatosAlumnos(),$datosArray);
        $res ="";
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            $res = $exc->getTraceAsString();
        }
        
        return $res;
        
    }





}

?>