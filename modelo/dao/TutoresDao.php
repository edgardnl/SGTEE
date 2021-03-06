<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/TutoresSql.php";

class TutoresDao {

    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function traeTutores() {
        $pP = TutoresSql::traeTutores();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new TutoresObjeto();            
            $lista[$x]->matricula = $row['matricula'];
            $lista[$x]->nombre = $row['nombre'];
            $lista[$x]->ap_p = $row['ap_p'];
            $lista[$x]->ap_m = $row['ap_m'];            
            $x++;
        }
        return $lista;
    }
    
    function agregaTutor($obj){
        $datosArray = array($obj->matricula,$obj->pass,$obj->id_role,$obj->nombre,$obj->ap_p,$obj->ap_m,$obj->carrera,$obj->telefono,$obj->correo,$obj->sexo);
        $pP = procesaParametros::PrepareStatement(TutoresSql::agregaTutores(),$datosArray);                        
        
        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
        
    }
    
    function treaTutorPorClave($clave){
        $datosArray = array($clave->clave);
        $pP = procesaParametros::PrepareStatement(TutoresSql::traeTutorPorClave(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new TutoresObjeto();
        $obj->id = $row['id_tutores'];                
        $obj->clave = $row['clave'];
        $obj->nombre = $row['nombre'];        
        
        return $obj;
    }
    
    function treTutorPorId($id){
        $datosArray = array($id->id);
        $pP = procesaParametros::PrepareStatement(TutoresSql::traeTutorPorId(),$datosArray);
       
        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new TutoresObjeto();        
        $obj->matricula = $row['matricula'];
        $obj->nombre = $row['nombre'];
        $obj->ap_p = $row['ap_p'];
        $obj->ap_m = $row['ap_m'];
        $obj->carrera = $row['carrera'];                        
        $obj->telefono = $row['telefono_cel'];
        $obj->correo = $row['correo'];
        $obj->sexo = $row['sexo'];
        
        return $obj;
    }
    
    function editaDatosTutor($obj){
        //$datosArray = array($obj->id,$obj->clave,$obj->nombre,$obj->ap_p,$obj->ap_m,$obj->asignatura,$obj->horaio);
        $pP = TutoresSql::editaDatosTutor($obj);                
        
        try {
            $this->con->query($pP);            
        } catch (Exception $exc) {
            print $exc->getMessage();
        }
    }
    
    function eliminaDatosTutor($obj){
        $datosArray = array($obj->matricula);
        $pP = procesaParametros::PrepareStatement(TutoresSql::eliminaDatosTutor(),$datosArray);        
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            print $exc->getTraceAsString();
        }
                
        
    }

    function traeTutorNombre() {
        $pP = TutoresSql::traeTutores();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new TutoresObjeto();
            $lista[$x]->matricula = $row['matricula'];
            $lista[$x]->nombre_tutor = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];          
            $x++;
        }
        return $lista;
    }

    function buscarTutorClave($obj){
        $datosArray = array($obj->matricula);
        $pP = procesaParametros::PrepareStatement(TutoresSql::buscarTutorClave(),$datosArray);        

        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new TutoresObjeto();
        $obj->nclave = $row['nclave'];                        
        
        return $obj;
    }

    function buscarTutorLogin($obj){
        $datosArray = array($obj->matricula,$obj->pass);
        $pP = procesaParametros::PrepareStatement(TutoresSql::buscarTutorLogin(),$datosArray);        

        $query = $this->con->query($pP);
        $row = $query->fetch_array();
        
        $obj = new TutoresObjeto();        
        $obj->nRegistros = $query->num_rows;
        $obj->matricula = $row['matricula'];
        $obj->nombre = $row['nombre'];                                
        
        return $obj;   
    }

    function cambiaPassTu($obj){
        $datosArray = array($obj->pass, $obj->matricula);
        $pP = procesaParametros::PrepareStatement(TutoresSql::editaPass(),$datosArray);
        
        try {
            $this->con->query($pP);
        } catch (Exception $exc) {
            print $exc->getMessage();
        }   
    }

}
