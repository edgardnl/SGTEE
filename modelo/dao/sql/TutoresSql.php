<?php

class TutoresSql {

    function traeTutores() {
        $query = "SELECT * FROM tutor;";
        return $query;
    }

    function agregaTutores() {
        $query = "insert into tutor(matricula,password,id_role,nombre,ap_p,ap_m,carrera,telefono_cel,correo,sexo) values(?,?,?,?,?,?,?,?,?,?);";
        return $query;
    }
    
    function traeTutorPorClave(){
        $query = "SELECT * FROM tutor WHERE clave = ? ;";
        return $query;
    }
    
    function traeTutorPorId(){
        $query = "SELECT * FROM tutor WHERE matricula = ? ;";
        return $query;
    }
    
    function editaDatosTutor($obj){
        $query = "update tutor set nombre = '".$obj->nombre."', ap_p = '".$obj->ap_p."', ap_m = '".$obj->ap_m."', carrera = '".$obj->carrera."',sexo = '".$obj->sexo."',correo = '".$obj->correo."', telefono_cel = '".$obj->telefono."' where matricula = ".$obj->matricula.";";
        return $query;
    }
    
    function eliminaDatosTutor(){
        $query = "delete from tutor where matricula = ?;";
        return $query;# 
    }

    function buscarTutorClave(){
        $query = "SELECT COUNT(tutor.matricula) as nclave FROM tutor WHERE tutor.matricula = ?;";
        return $query;#    
    }

    function buscarTutorLogin(){
        $query = "SELECT * FROM tutor WHERE tutor.matricula = ? AND tutor.password = ? ;";
        return $query;#       
    }

}
